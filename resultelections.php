<?php
include('connection.php');
session_start();
if (isset($_SESSION["admin"])) {
	
	$res = mysqli_query($conn,"SELECT * FROM inscrit where idpartie <> '0'");
	$total_vote = mysqli_num_rows($res);
	echo "$total_vote";

	
	$res2 = mysqli_query($conn,"SELECT * FROM provinces");
	$total_nb_place_party = 0;
	while($row = mysqli_fetch_assoc($res2)) {
		$nb_place = $row["nb_place"];
    $total_nb_place_party = 0;
		$res1 = mysqli_query($conn,"SELECT count(idpartie) as nb_vote, idpartie from inscrit where cin<>'ADMIN' and idpartie>'0' group by idpartie ORDER BY nb_vote DESC");
		while($row1 = mysqli_fetch_assoc($res1)) {

		    $nb_vote = $row1["nb_vote"];
		    $idpartie = $row1["idpartie"];
		    $id_provinces = $row["id_provinces"];

		    $a = $total_vote / $nb_vote;
		    $b = $row["nb_place"] / $a;
            echo "$b      ++";

            $nb_place_party = (int) $b;
            $total_nb_place_party += $nb_place_party;

            $query = mysqli_query($conn,"INSERT INTO appartenir(idpartie,id_provinces,nb_place_party) values('$idpartie','$id_provinces','$nb_place_party')");
	}
	if ($nb_place > $total_nb_place_party) {

		$res = mysqli_query($conn,"SELECT * FROM appartenir where id_provinces='$id_provinces'");
		while ($row2 = mysqli_fetch_assoc($res)) {
			$nb_place_party = $row2["nb_place_party"];
			$nb_place_party += 1;


			if ($nb_place > $total_nb_place_party) {
				$id_province = $row2["id_provinces"];
				$idpartie = $row2["idpartie"];
				$query = mysqli_query($conn,"UPDATE appartenir SET nb_place_party='$nb_place_party' WHERE idpartie = '$idpartie' and id_provinces = '$id_province'");
			}
			$total_nb_place_party += 1;

		}
	echo "         $nb_place           $total_nb_place_party  ";
}


}
}
header('location:user.php');
?>