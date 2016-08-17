<?php 

namespace Jarenal;

class AvailabilityGenerator {

	private $source_data;

	public function __construct($source_data){
		$this->source_data = $source_data;
	}

	public function getData(){
		$data = array("availability" => array(),
					  "minimumstay"  => array(),
					  "closedonarrival" => array(),
					  "closedondeparture" => array(),
					  "max_stay" => array(),
					  //"max_previous_stay" => array()
					  );

		// I take the first room as template for get all the days
		$first_room = current($this->source_data);

		foreach ($first_room as $date => $value) 
		{
			$max_stay = $this->getMaxStay($this->source_data, $date);
			$max_previous_stay = $this->getMaxPreviousStay($this->source_data, $date);

			$data["availability"][$date]      = $this->getAvailability($value['minimum'], $this->source_data, $date); 
			$data["minimumstay"][$date]       = $value['minimum'];
			$data["closedonarrival"][$date]   = $this->getClosedOnArrival($value['minimum'], $max_stay);
			$data["closedondeparture"][$date] = $this->getClosedOnDeparture($value['minimum'], $max_previous_stay);
			$data["max_stay"][$date]          = $max_stay;
			//$data["max_previous_stay"][$date] = $max_previous_stay;

		}

		return $data;
	}

	private function getAvailability($minimumstay, $source_data, $start_date){
		$total_rooms = 0;

		foreach ($source_data as $room => $days) 
		{
			$free_days = 0;

			foreach ($days as $current_date => $info) 
			{
				if($current_date<$start_date)
					continue;

				if($info["status"]==1)
				{
					//$free_days++;
					break;
				}

				$free_days++;

			}

			if($free_days>=$minimumstay)
				$total_rooms++;
		}

		return $total_rooms;
	}

	private function getClosedOnArrival($minimumstay, $max_stay){
		if($max_stay < $minimumstay)
			return 1;
		else
			return 0;
	}

	private function getClosedOnDeparture($minimumstay, $max_previous_stay){
		if($max_previous_stay < $minimumstay)
			return 1;
		else
			return 0;
	}

	private function getMaxPreviousStay($source_data, $target_date){
		$max_previous_stay = 0;

		foreach ($source_data as $room => $days) 
		{
			$room_max_stay = 0;

			foreach ($days as $current_date => $info) 
			{
				if($current_date > $target_date || $current_date==$target_date)
					break;

				if($info["status"]==1)
					continue;

				$room_max_stay++;
			}

			if($room_max_stay > $max_previous_stay)
				$max_previous_stay = $room_max_stay;
		}

		return $max_previous_stay;
	}

	private function getMaxStay($source_data, $target_date){

		$max_stay = 0;

		foreach ($source_data as $room => $days) 
		{
			$room_max_stay = 0;

			foreach ($days as $current_date => $info) 
			{
				if($current_date < $target_date)
					continue;

				if($info["status"]==1)
					break;

				$room_max_stay++;
			}

			if($room_max_stay > $max_stay)
				$max_stay = $room_max_stay;
		}

		return $max_stay;
	}
}