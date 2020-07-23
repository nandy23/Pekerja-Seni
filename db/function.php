<?php

class Databasedx
{

	function __construct()
	{
		try {
			$conn = new PDO("mysql:host=localhost;dbname=uprising", "root", "");
		} catch (PDOException $e) {
			alert('Try Again');
		}
		$this->db = $conn;
	}

	function uploadTrack($uploader, $artist, $title, $image, $track)
	{
		if (
			!empty($artist) &&
			!empty($title) &&
			!empty($image) &&
			!empty($track)
		) {

			// CEK EKSTENSI GAMBAR
			$imgEks = explode('.', $image['name']);
			$imgEks = strtolower(end($imgEks));
			if ($imgEks === "jpg" or $imgEks === "png") {

				// CEK EKSTENSI TRACK
				$trackEks = explode('.', $track['name']);
				$trackEks = strtolower(end($trackEks));
				if ($trackEks === "mp3" or $imgEks === "wav") {

					// == UPLOAD IMAGE
					$imgTmp = $image['tmp_name'];
					$image = $image["name"];

					// if(file_exists("assets/track images/" . $image)) {
					// 	$i = count(file_exists("assets/track images/" . $image));
					// 	$image = explode('.', $image);
					// 	$image = $image[0] . $i . '.' . $image[count(end($image))];

					// }
					move_uploaded_file($imgTmp, 'assets/track images/' . $image);

					// == UPLOAD TRACK
					$trackTmp = $track['tmp_name'];
					$track = $track['name'];
					move_uploaded_file($trackTmp, 'assets/tracks/' . $track);

					// == QUERY ALL
					$query = "INSERT INTO tracks VALUES('', '$uploader', '$artist', '$title', now(), '$image', '$track')";

					$stmt = $this->db->prepare($query);
					$stmt->execute();

					return 2;
				}
			} else {
				echo "<script>alert('Gambar tidak sesuai!'); document.location.href = '';</script>";
			}
		} else {
			echo "<script>alert('Fail Upload!');</script>";
		}
	}



	// function getAllTrack()
	// {
	// 	$query = "SELECT * FROM tracks";
	// 	$stmt = $this->db->prepare($query);
	// 	$stmt->execute();

	// 	return $stmt->fetchall(PDO::FETCH_ASSOC);
	// }

	function getAllKategori()
	{
		$query = "SELECT * FROM kategori";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getKategoriById($id)
	{
		$query = "SELECT * FROM kategori WHERE id=$id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getAllUser()
	{
		$query = "SELECT * FROM users";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getAllPortofolio()
	{
		$query = "SELECT * FROM portofolio";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getPortofoliById($id)
	{
		$query = "SELECT * FROM portofolio WHERE id=$id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getAllProfile()
	{
		$query = "SELECT * FROM profile";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getProfileById($id)
	{
		$query = "SELECT * FROM profile WHERE id=$id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function tambahKategori($kategori)
	{
		if (

			!empty($kategori)

		) {
			$query = "INSERT INTO kategori VALUES('', '$kategori')";

			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return 2;
		} else {
			echo "<script>alert('Gagal Menambahkan');</script>";
		}
	}

	function getThirdTrack()
	{
		$query = "SELECT * FROM tracks ORDER BY id DESC LIMIT 3";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function getThirdPortofolio()
	{
		$query = "SELECT * FROM portofolio ORDER BY id DESC LIMIT 3";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}

	function deletePortofolio($id)
	{
		// GET THIS TRACK
		$query = "SELECT * FROM portofolio WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$dUser = $stmt->fetch(PDO::FETCH_ASSOC);

		// HAPUS GAMBAR
		$fileImg = "assets/images/" . $dUser["gambar"];
		unlink($fileImg);

		// HAPUS DATA
		$query = "DELETE FROM portofolio WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function deleteProfile($id)
	{
		// GET THIS TRACK
		$query = "SELECT * FROM profile WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$dUser = $stmt->fetch(PDO::FETCH_ASSOC);

		// HAPUS GAMBAR
		$fileImg = "assets/images/" . $dUser["gambar"];
		unlink($fileImg);

		// HAPUS DATA
		$query = "DELETE FROM profile WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function deleteKategori($id)
	{
		// HAPUS DATA
		$query = "DELETE FROM kategori WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function deleteUser($id)
	{
		// HAPUS DATA
		$query = "DELETE FROM user WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function deleteTrack($id)
	{
		// GET THIS TRACK
		$query = "SELECT * FROM tracks WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$dUser = $stmt->fetch(PDO::FETCH_ASSOC);

		// HAPUS GAMBAR
		$fileImg = "assets/track images/" . $dUser["track_img"];
		unlink($fileImg);
		// HAPUS LAGU
		$fileTrack = "assets/tracks/" . $dUser["track_name"];
		unlink($fileTrack);

		// HAPUS DATA
		$query = "DELETE FROM tracks WHERE id = $id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function ubahProfile($id, $nama, $alamat, $no_tlp, $kategori, $link, $image)
	{
		// GET THIS TRACK
		$query = "SELECT * FROM profile WHERE id=$id";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$dUser = $stmt->fetch(PDO::FETCH_ASSOC);

		// var_dump($dUser);
		// exit;

		// HAPUS GAMBAR
		if (file_exists("assets/images/" . $dUser["gambar"])) {
			$fileImg = "assets/images/" . $dUser["gambar"];
			unlink($fileImg);
		}
		// HAPUS LAGU

		// HAPUS DATA
		// $query = "DELETE FROM tracks WHERE id = $id";
		// $stmt = $this->db->prepare($query);
		// $stmt->execute();

		// tambah data
		if (
			!empty($id) &&
			!empty($nama) &&
			!empty($alamat) &&
			!empty($no_tlp) &&
			!empty($link) &&
			!empty($kategori)
		) {

			// CEK EKSTENSI GAMBAR
			$imgEks = explode('.', $image['name']);
			$imgEks = strtolower(end($imgEks));
			if ($imgEks === "jpg" or $imgEks === "png") {

				// CEK EKSTENSI TRACK
				// $trackEks = explode('.', $track['name']);
				// $trackEks = strtolower(end($trackEks));
				// if ($trackEks === "mp3" or $imgEks === "wav") {

				// == UPLOAD IMAGE
				$imgTmp = $image['tmp_name'];
				$image = $image["name"];

				if (file_exists("assets/images/" . $image)) {
					// $i = count("assets/images/" . $image);
					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				} else {

					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				}

				move_uploaded_file($imgTmp, 'assets/images/' . $image_hasil);

				// // == UPLOAD TRACK
				// $trackTmp = $track['tmp_name'];
				// $track = $track['name'];
				// move_uploaded_file($trackTmp, 'assets/tracks/' . $track);

				// == QUERY ALL
				$query = "UPDATE profile set 
											nama = '$nama', 
											alamat = '$alamat', 
											no_hp = '$no_tlp', 
											link_yutub ='$link', 
											gambar='$image_hasil', 
											id_kategori = '$kategori' 
								WHERE id=$id";

				$stmt = $this->db->prepare($query);
				$stmt->execute();

				return 2;
			} else {
				echo "<script>alert('Gambar tidak sesuai!'); document.location.href = '';</script>";
			}
		} else {
			echo "<script>alert('Fail Upload!');</script>";
		}
	}

	function ubahKategori($id, $kategori)
	{
		if (
			!empty($id) &&
			!empty($kategori)
		) {
			// == QUERY ALL
			$query = "UPDATE kategori set kategori = '$kategori' WHERE id=$id";

			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return 2;
		} else {
			echo "<script>alert('Gagal Ubah Data');</script>";
		}
	}


	// ================================================

	function signUp($name, $email, $password)
	{
		$query = "INSERT INTO users VALUES('', '$name', '$email', '$password', NOW(), 'defaultfoto.png', 'member')";

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function signIn($email, $password)
	{
		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function uploadPortofolio($artist, $judul, $link, $kategori, $deskripsi, $image)
	{
		if (
			!empty($artist) &&
			!empty($judul) &&
			!empty($link) &&
			!empty($kategori) &&
			!empty($deskripsi)
		) {

			// CEK EKSTENSI GAMBAR
			$imgEks = explode('.', $image['name']);
			$imgEks = strtolower(end($imgEks));
			if ($imgEks === "jpg" or $imgEks === "png") {

				// CEK EKSTENSI TRACK
				// $trackEks = explode('.', $track['name']);
				// $trackEks = strtolower(end($trackEks));
				// if ($trackEks === "mp3" or $imgEks === "wav") {

				// == UPLOAD IMAGE
				$imgTmp = $image['tmp_name'];
				$image = $image["name"];

				if (file_exists("assets/images/" . $image)) {
					// $i = count("assets/images/" . $image);
					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				} else {

					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				}
				move_uploaded_file($imgTmp, 'assets/images/' . $image_hasil);

				// // == UPLOAD TRACK
				// $trackTmp = $track['tmp_name'];
				// $track = $track['name'];
				// move_uploaded_file($trackTmp, 'assets/tracks/' . $track);

				// == QUERY ALL
				$query = "INSERT INTO portofolio VALUES('', '$artist','$judul', '$link', '$deskripsi', '$image_hasil','$kategori')";

				$stmt = $this->db->prepare($query);
				$stmt->execute();
				// var_dump($stmt);
				// exit;

				return 2;
			} else {
				echo "<script>alert('Gambar tidak sesuai!'); document.location.href = '';</script>";
			}
		} else {
			echo "<script>alert('Fail Upload!');</script>";
		}
	}

	function tambahProfile($nama, $alamat, $no_tlp, $kategori, $link, $image)
	{
		if (
			!empty($nama) &&
			!empty($alamat) &&
			!empty($no_tlp) &&
			!empty($link) &&
			!empty($kategori)
		) {

			// CEK EKSTENSI GAMBAR
			$imgEks = explode('.', $image['name']);
			$imgEks = strtolower(end($imgEks));
			if ($imgEks === "jpg" or $imgEks === "png") {

				// CEK EKSTENSI TRACK
				// $trackEks = explode('.', $track['name']);
				// $trackEks = strtolower(end($trackEks));
				// if ($trackEks === "mp3" or $imgEks === "wav") {

				// == UPLOAD IMAGE
				$imgTmp = $image['tmp_name'];
				$image = $image["name"];

				if (file_exists("assets/images/" . $image)) {
					// $i = count("assets/images/" . $image);
					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				} else {

					$image = explode('.', $image);
					$image_hasil = $image[0] . "foto" . '.' . $image[1];
				}

				move_uploaded_file($imgTmp, 'assets/images/' . $image_hasil);

				// // == UPLOAD TRACK
				// $trackTmp = $track['tmp_name'];
				// $track = $track['name'];
				// move_uploaded_file($trackTmp, 'assets/tracks/' . $track);

				// == QUERY ALL
				$query = "INSERT INTO profile VALUES('', '$nama','$alamat', '$no_tlp', '$link', '$image_hasil','$kategori')";

				$stmt = $this->db->prepare($query);
				$stmt->execute();

				return 2;
			} else {
				echo "<script>alert('Gambar tidak sesuai!'); document.location.href = '';</script>";
			}
		} else {
			echo "<script>alert('Fail Upload!');</script>";
		}
	}
}
