<?php 

namespace Jarenal\Fixtures;

class DummyData {

	public static function get($name){

		$dummy = array();

    	$dummy["csvparsertest-one"][1] = array();
    	$dummy["csvparsertest-one"][1]["2016-06-01"] = array("minimum"=>4, "status"=>1);
    	$dummy["csvparsertest-one"][1]["2016-06-02"] = array("minimum"=>4, "status"=>0);
    	$dummy["csvparsertest-one"][1]["2016-06-03"] = array("minimum"=>2, "status"=>1);
    	$dummy["csvparsertest-one"][1]["2016-06-04"] = array("minimum"=>2, "status"=>0);

    	// availability-test-1
    	$dummy['availability-test-1'] = array("availability"=>array(),
    		"minimumstay"=>array(),
    		"closedonarrival"=>array(),
    		"closedondeparture"=>array(),
    		"max_stay"=>array());

    	$dummy['availability-test-1']["availability"] = array("2016-06-01" => 1,
            "2016-06-02" => 1,
            "2016-06-03" => 1,
            "2016-06-04" => 1,
            "2016-06-05" => 1,
            "2016-06-06" => 1,
            "2016-06-07" => 0,
            "2016-06-08" => 0,
            "2016-06-09" => 0,
            "2016-06-10" => 0);
    	$dummy['availability-test-1']["minimumstay"] = array("2016-06-01" => 5,
            "2016-06-02" => 5,
            "2016-06-03" => 5,
            "2016-06-04" => 5,
            "2016-06-05" => 5,
            "2016-06-06" => 5,
            "2016-06-07" => 5,
            "2016-06-08" => 5,
            "2016-06-09" => 5,
            "2016-06-10" => 5);
    	$dummy['availability-test-1']["closedonarrival"] = array("2016-06-01" => 0,
            "2016-06-02" => 0,
            "2016-06-03" => 0,
            "2016-06-04" => 0,
            "2016-06-05" => 0,
            "2016-06-06" => 0,
            "2016-06-07" => 1,
            "2016-06-08" => 1,
            "2016-06-09" => 1,
            "2016-06-10" => 1);
    	$dummy['availability-test-1']["closedondeparture"] = array("2016-06-01" => 1,
            "2016-06-02" => 1,
            "2016-06-03" => 1,
            "2016-06-04" => 1,
            "2016-06-05" => 1,
            "2016-06-06" => 0,
            "2016-06-07" => 0,
            "2016-06-08" => 0,
            "2016-06-09" => 0,
            "2016-06-10" => 0);
    	$dummy['availability-test-1']["max_stay"] = array("2016-06-01" => 10,
            "2016-06-02" => 9,
            "2016-06-03" => 8,
            "2016-06-04" => 7,
            "2016-06-05" => 6,
            "2016-06-06" => 5,
            "2016-06-07" => 4,
            "2016-06-08" => 3,
            "2016-06-09" => 2,
            "2016-06-10" => 1);    	

        // availability-test-2
    	$dummy['availability-test-2'] = array("availability"=>array(),
    		"minimumstay"=>array(),
    		"closedonarrival"=>array(),
    		"closedondeparture"=>array(),
    		"max_stay"=>array());

    	$dummy['availability-test-2']["availability"] = array("2016-06-01" => 1,
            "2016-06-02" => 0,
            "2016-06-03" => 0,
            "2016-06-04" => 0,
            "2016-06-05" => 0,
            "2016-06-06" => 1,
            "2016-06-07" => 0,
            "2016-06-08" => 0,
            "2016-06-09" => 0,
            "2016-06-10" => 0);
    	$dummy['availability-test-2']["minimumstay"] = array("2016-06-01" => 5,
            "2016-06-02" => 5,
            "2016-06-03" => 5,
            "2016-06-04" => 5,
            "2016-06-05" => 5,
            "2016-06-06" => 5,
            "2016-06-07" => 5,
            "2016-06-08" => 5,
            "2016-06-09" => 5,
            "2016-06-10" => 5);
    	$dummy['availability-test-2']["closedonarrival"] = array("2016-06-01" => 0,
            "2016-06-02" => 1,
            "2016-06-03" => 1,
            "2016-06-04" => 1,
            "2016-06-05" => 1,
            "2016-06-06" => 0,
            "2016-06-07" => 1,
            "2016-06-08" => 1,
            "2016-06-09" => 1,
            "2016-06-10" => 1);
    	$dummy['availability-test-2']["closedondeparture"] = array("2016-06-01" => 1,
            "2016-06-02" => 1,
            "2016-06-03" => 1,
            "2016-06-04" => 1,
            "2016-06-05" => 1,
            "2016-06-06" => 0,
            "2016-06-07" => 0,
            "2016-06-08" => 0,
            "2016-06-09" => 0,
            "2016-06-10" => 0);
    	$dummy['availability-test-2']["max_stay"] = array("2016-06-01" => 5,
            "2016-06-02" => 4,
            "2016-06-03" => 3,
            "2016-06-04" => 2,
            "2016-06-05" => 1,
            "2016-06-06" => 5,
            "2016-06-07" => 4,
            "2016-06-08" => 3,
            "2016-06-09" => 2,
            "2016-06-10" => 1);

    	return $dummy[$name];
	}
}