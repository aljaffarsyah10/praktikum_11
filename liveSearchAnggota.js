var keyword = document.getElementById('keyword');
// var tabel_anggota = document.getElementById('tabel_anggota');
var tabel_anggota = document.getElementById('tabel_anggota');
var tabel_anggota2 = document.getElementById('tabel_anggota2');

//ketika keyword ditulis... maka jalankan fungsi ini
keyword.addEventListener('keyup', function(){
	//buat objek ajax
	var xmlhttp = new XMLHttpRequest();

	//cek kesiapan ajax
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status==200){
			//update tabel anggota
			// console.log("ajaxnya uda jalan");
			// console.log(xmlhttp.responseText);
			tabel_anggota.innerHTML = xmlhttp.responseText;
			tabel_anggota2.innerHTML = xmlhttp.responseText;
		}
	}

	//eksekusi ajax
	// xmlhttp.open('GET','coba.txt',true);

	xmlhttp.open('GET','dbconn_ambil_anggota_byname.php?keyword='+keyword.value,true);
	
	xmlhttp.send();
})