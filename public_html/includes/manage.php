<?php 
/**
* 
*/
class Manage{

	private $con;
	
	function __construct(){
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function manageRecordWithPagination($table,$pno){
		$a = $this->pagination($this->con,$table,$pno,5);
		if ($table == "categories") {
			$sql = "SELECT p.category_name AS category, c.category_name AS parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_category = c.category_id ";
		}
		$result = $this->con->query($sql) OR DIE($this->con->error);
		$rows = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
		}
		return["rows"=>$rows,"pagination"=>$a["pagination"]];
	}

	private function pagination($con,$table,$pno,$n){
		$query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
		$row = mysqli_fetch_assoc($query);
		//$totalRecords = 100000;
		$pageno = $pno;
		$numberOfRecordsPerPage = $n;

		$last = ceil($row["rows"]/$numberOfRecordsPerPage);

		/*echo "Total Pages ".$last."<br/>";*/

		$pagination ="<ul class='pagination'>";

		if ($last != 1) {
			if ($pageno > 1) {
				$previous = "";
				$previous = $pageno - 1;
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#33333;'> Previous </a></li></li>";
			}
			for ($i=$pageno - 5; $i < $pageno; $i++) { 
				if ($i > 0) {
					$pagination .="<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
				}
			}
			$pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#33333;'>$pageno</a></li>";
			for ($i=$pageno + 1; $i <= $last; $i++) { 
				$pagination .="<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
				if ($i > $pageno + 4) {
					break;
				}
			}
			if ($last > $pageno) {
				$next = $pageno + 1;
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#33333;'> Next </a></li></ul>";
			}
		}
		$limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
		return ["pagination"=>$pagination,"limit"=>$limit];
	}

}

/*$obj = new Manage();
echo "<pre>";
print_r($obj->manageRecordWithPagination("categories",1));
*/

?>