<?php
include 'koneksi.php';


$p = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$profile = mysqli_fetch_assoc($p);


$skills = mysqli_query($conn, "SELECT * FROM skills");


$cert = mysqli_query($conn, "SELECT * FROM certificates");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Ramadhan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <nav class="navbar">
        <h2 class="logo">MyPortfolio</h2>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#certificates">Certificates</a></li>
        </ul>
    </nav>


    <section id="home" class="home">
        <img src="assets/ramadhan.png" alt="Foto Profil">
        <h1>Halo, Saya <?php echo $profile['nama']; ?></h1>
        <p><?php echo $profile['deskripsi']; ?></p>
    </section>


    <section id="about" class="about">
        <h2>About Me</h2>
        <p>
            Saya adalah mahasiswa yang tertarik untuk belajar di bidang web development.
            Saya sedang belajar HTML, CSS, dan JavaScript.
        </p>

        <h3>Skills</h3>

        <?php while($s = mysqli_fetch_assoc($skills)) { ?>
        <div class="skill">
            <span><?php echo $s['nama_skill']; ?></span>
            <div class="progress">
                <div class="bar" style="width: <?php echo $s['persen']; ?>%"></div>
            </div>
        </div>
        <?php } ?>

        <h3>Experience</h3>
        <ul>
            <li>Belajar Web Development Mandiri</li>
            <li>Mengerjakan Project Website Sederhana</li>
            <li>Staf Biro - INFORSA 2025</li>
        </ul>
    </section>


    <section id="certificates" class="certificates">
        <h2>Certificates</h2>

        <div class="card-container">
            <?php while($c = mysqli_fetch_assoc($cert)) { ?>
            <div class="card">
                <h4><?php echo $c['judul']; ?></h4>
                <p><?php echo $c['penerbit']; ?></p>
            </div>
            <?php } ?>
        </div>
    </section>

    <footer>
        <p>© 2025 Ramadhan</p>
    </footer>

</body>
</html>