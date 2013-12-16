<div class="container-fluid">
    <div class="row-fluid row">
        <div class="span3">
            <div class="well sidebar-nav-fixed">
                <ul class="nav nav-list">
                    <li class="nav-header">Data</li>
                    <li class="flag"><a href="#mataKuliah">Mata Kuliah</a></li>
                    <li class="flag"><a href="#dosen">Dosen</a></li>
                    <li class="flag"><a href="#ruangKelas">Ruang Kelas</a></li>
                    <li class="flag"><a href="#atribut">Atribut</a></li>			  
                    <li class="nav-header">Cara Penggunaan</li>
                    <li class="flag"><a href="#periode">Tentukan Periode Perkuliahan</a></li>
                    <li class="flag"><a href="#kurikulum">Tentukan Kurikulum</a></li>
                    <li class="flag"><a href="#pengajar">Tentukan Pengajar</a></li>
                    <li class="flag"><a href="#waktu">Tentukan Waktu Pengajar</a></li>
                    <li class="flag"><a href="#generate">Generate Jadwal</a></li>
                    <li class="nav-header">FAQ</li>
                    <li class="flag"><a href="#backend">Back end tidak berjalan</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->

        <div class="span9 span-fixed-sidebar">
            <div class="span10">
                <!--Body content-->
                <img src="img/banner.jpg" class="img-rounded">		
                <br><br><br><br>
                <h1><i class="icon-th-large"></i>Prolog</h1>
                <br><br>
                <p>Dokumentasi berikut berisi cara penggunaan aplikasi Penjadwalan Otomatis.</p>
                <p>Agar aplikasi dapat berjalan dengan baik, back end pada server harus dijalankan terlebih dahulu.</p>
            </div>


            <div class="row-fluid">			
                <div id="mataKuliah" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-tags"></i>Mata Kuliah</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk melakukan CRUD (Create Remove Update Delete) semua data-data mata kuliah.
                        Data-data ini terdiri dari 
                    <ul>
                        <li>
                            Nama Mata Kuliah
                        </li>
                        <li>
                            Code Mata Kuliah
                        </li>
                        <li>
                            Praktek Atau Teori
                        </li>
                        <li>
                            Jumlah sks
                        </li>
                    </ul>
                    </p>

                    <code>Data/Mata Kuliah</code>
                </div>

                <div id="dosen" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-hdd"></i>Dosen</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk melakukan CRUD (Create Remove Update Delete) semua data-data dosen.
                        Data-data ini terdiri dari 
                    <ul>
                        <li>
                            Nama lengkap dosen
                        </li>
                        <li>
                            Nomor Induk
                        </li>
                        <li>
                            Batas lantai dimana dosen dapat menggunakan ruang perkuliahan. Jika tidak diisi maka dosen tersebut dapat menggunakan ruang kelas di semua lantai.  
                        </li>
                    </ul>
                    </p>

                    <code>Data/Dosen</code>

                </div>

                <div id="ruangKelas" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-user"></i>Ruang Kelas</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk melakukan CRUD (Create Remove Update Delete) semua data-data Ruang Kelas yang dapat digunakan untuk perkuliahan.
                        Data-data ini terdiri dari 
                    <ul>
                        <li>
                            Nomor Ruangan
                        </li>
                        <li>
                            Gedung dimana ruangan tersebut berada 
                        </li>
                        <li>
                            Lantai dimana ruangan tersebut berada 
                        </li>
                        <li>
                            Ruangan untuk mata kuliah praktek atau teori 
                        </li>
                        <li>
                            Atribut ruangan. Setiap ruangan dapat memiliki properti yang berbeda-beda. Dengan adanya data ini mata kuliah tertentu dapat lebih spesifik lagi pengalokasiannya. 
                        </li>

                    </ul>
                    </p>

                    <code>Data/Ruang Kelas</code>
                </div>

                <div id="atribut" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-ok"></i>Atribut</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk melakukan CRUD (Create Remove Update Delete) semua data-data properti ruangan.
                        Data-data ini terdiri dari 
                    <ul>
                        <li>
                            keterangan properti yang dimiliki
                        </li>
                    </ul>
                    </p>
                    <code>Data/Atribut</code>
                </div>

                <div id="periode" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-tasks"></i>Tentukan Periode Perkuliahan</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk menentukan periode perkuliahan dari jadwal yang akan kita susun.
                        Jika kita belum menentukan periode perkuliahan maka kita tidak bisa melakukan langkah selanjutnya.
                    </p>
                    <code>Generate Jadwal/Tentukan Periode Perkuliahan</code>
                </div>

                <div id="kurikulum" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-share"></i>Tentukan Kurikulum</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk menentukan mata kuliah apa saja yang akan dibuka dan jumlah kelas yang akan dibuka. 
                        Jika kita belum menentukan kurikulum maka kita tidak bisa melakukan langkah selanjutnya.
                        Data-data ini terdiri dari 
                    <ul>
                        <li>
                            Mata Kuliah yang akan dibuka
                        </li>
                        <li>
                            Jumlah kelas yang akan dibuka
                        </li>
                        <li>
                            Hari perkuliahan. Hari apa saja mata kuliah ini dapat diselenggarakan. Jika tidak diisi maka mata kuliah dapat diselenggarakan setiap hari.
                        </li>
                        <li>
                            Atribut ruang kelas yang harus dimiliki agar dapat digunakan untuk mengajar mata kuliah tersebut. Jika tidak diisi maka mata kuliah tersebut dapat dilakukan di ruang mana saja asalkan sesuai (teori/praktek).
                        </li>
                        <li>
                            Nomor ruang kelas secara spesifik. Data ini mengharuskan mata kuliah tersebut diajar di ruang mana saja. 
                        </li>
                    </ul>
                    </p>
                    <code>Generate Jadwal/Tentukan Kurikulum</code>
                </div>

                <div id="pengajar" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-share"></i>Tentukan Pengajar</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk menentukan mata kuliah dapat diajar oleh dosen mana saja.
                    </p>
                    <code>Generate Jadwal/Tentukan Pengajar</code>
                </div>

                <div id="waktu" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-share"></i>Tentukan Waktu Pengajar</h1>
                    </div>
                    <p class="lead">
                        Halaman ini bertujuan untuk menentukan waktu dosen yang tersedia.
                        Data ini terdiri dari hari dan pukul berapa dosen dapat mengajar.
                    </p>
                    <code>Generate Jadwal/Tentukan Waktu Pengajar</code>
                </div>

                <div id="generate" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-share"></i>Generate Jadwal</h1>
                    </div>
                    <p class="lead">
                        Dengan memilih menu ini maka aplikasi akan mengenerate secara otomatis jadwal perkuliahan.
                        Durasi waktu yang dibutuhkan bergantung dengan banyaknya ketentuan-ketentuan yang dimasukkan.
                        Ketika sedang mengenerate jadwal, user dapat menutup aplikasi tanpa menghawatirkan apakah proses penyusunan jadwal berhenti atau tidak.
                        Karena proses penyusunan dilakukan di server.
                    </p>
                    <code>Generate Jadwal/Generate Jadwal</code>
                </div>

                <div id="backend" class="span-10">
                    <div class="page-header">
                        <h1><i class="icon-share"></i>Back End Tidak Berjalan</h1>
                    </div>
                    <p class="lead">
                        Jika seteleh memilih menu Generate Jadwal, user dihadapkan dengan pesan "Back end tidak berjalan", maka proses penyusunan jadwal tidak dapat dilakukan karena
                        service di server tidak sedang berjalan. Segera hubungi system administrator yang bertanggung jawab untuk mengatasi masalah ini.
                    </p>
                </div>



            </div><!--/row-->

            <hr>



        </div>