<style>
  .aarea {
    /*background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);*/
    background: linear-gradient(-45deg, #fff, #23a6d5, #fff, #23a6d5);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    background-image: url('assets/page-w3/img/hero/hero_mini-svgap.png');
    background-size: cover;
  }

  @keyframes gradient {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }


  * {
    box-sizing: border-box;
  }

  .wrapper {
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
  }

  .kadecard {
    width: 355px;
    height: 340px;
    margin: 1em;
    perspective: 1500px;
  }
  .kadecard .content {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 0.8s cubic-bezier(0.75, 0, 0.85, 1);
  }

  .more {
    display: none;
  }
  .more:checked ~ .content {
    transform: rotateY(180deg);
  }

  .front,
  .back {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    transform-style: preserve-3d;

  }
  .front .inner,
  .back .inner {
    height: 100%;
    display: grid;
    padding: 1.5em;
    transform: translateZ(80px) scale(0.94);
  }

  .front {
    background-color: #fff;
    background-size: cover;
    background-position: center center;
  }
  .front:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 0px 90px 0px 90px;
    backface-visibility: hidden;
    /*background: linear-gradient(40deg, rgba(67, 138, 243, 0.7), rgba(255, 242, 166, 0.7));*/
    background: linear-gradient(40deg, rgba(81, 151, 243, 0.35), rgba(27, 104, 243, 0.85));
  }
  .front .inner {
    grid-template-rows: 5fr 1fr 1fr 2fr 1fr;
    justify-items: center;
  }
  .front h2 {
    grid-row: 2;
    margin-bottom: 0.3em;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: #fff;
    font-weight: 500;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
    color: #fff;
    padding: 10px 50px 10px 50px;
    display: inline-block;
    text-transform: capitalize;
    cursor: pointer;
    font-size: 23px;
    background: linear-gradient(40deg, rgb(243, 27, 88), rgba(7, 251, 228, 0.84), rgb(7, 125, 251));
  }
  .front .rating {
    grid-row: 3;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    display: flex;
    flex-flow: row nowrap;
  }
  .front .rating i {
    margin: 0 1px;
  }

  .back {
    transform: rotateY(180deg);
    background-color: #fff;
    border: 2px solid #f0f0f0;
    border-radius: 0px 90px 0px 90px;
  }
  .back .inner {
    grid-template-rows: 6fr 2fr 1fr 2fr 14fr 1fr 1fr;
    grid-template-columns: repeat(4, auto);
    grid-column-gap: 0.8em;
    justify-items: center;
  }
  .back .info {
    position: relative;
    display: flex;
    align-items: center;
    color: #355cc9;
    grid-row: 3;
  }
  .back .info:not(:first-of-type):before {
    content: "";
    position: absolute;
    left: -0.9em;
    height: 18px;
    width: 1px;
    background-color: #ccc;
  }
  .back .info span {
    font-size: 2em;
    font-weight: 700;
  }
  .back .info i {
    font-size: 1.2em;
  }
  .back .info i:before {
    background: linear-gradient(40deg, #355cc9, #438af3);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
  }
  .back .info .icon {
    margin-left: 0.3em;
  }
  .back .info .icon span {
    display: block;
    margin-top: -0.25em;
    font-size: 0.8em;
    font-weight: 600;
    white-space: nowrap;
  }
  .back .description {
    grid-row: 5;
    grid-column: 1/-1;
    font-size: 0.86em;
    border-radius: 5px;
    font-weight: 600;
    line-height: 1.4em;
    overflow: auto;
    color: #355cc9;
    padding-right: 10px;
  }
  .back .location,
  .back .price {
    font-weight: 600;
    color: #355cc9;
    grid-row: 1;
    font-size: 1.86em;

    border: solid 2px #fff;
    color: #fff;
    border-radius: 4px;
    text-align: center;
    left: 50%;
    backface-visibility: hidden;
    transition: 0.3s ease-in-out;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
    background: linear-gradient(40deg, rgba(27, 104, 243, 0.85), rgba(27, 104, 243, 0.85));
    color: #fff;
    padding: 10px 35px 10px 35px;
    display: inline-block;
    text-transform: capitalize;
    cursor: pointer;
    font-size: 14px;
    border-radius: 0px 50px 0px 50px;
  }
  .back .location {
    grid-column: 1/3;
    justify-self: left;
  }
  .back .price {
    grid-column: 3/-1;
    justify-self: right;
  }
  .back .button {
    grid-column: 1/-1;
    justify-self: center;
  }

  .button {
    grid-row: -1;
  /*text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;
  display: block;
  padding: 0 1.5em;
  height: 3em;
  line-height: 2.9em;
  min-width: 3em;
  background-color: transparent;*/
  border: solid 2px #fff;
  /*color: #fff;
  border-radius: 4px;
  text-align: center;
  left: 50%;
  backface-visibility: hidden;
  transition: 0.3s ease-in-out;*/
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
  /*background: linear-gradient(40deg, rgba(27, 104, 243, 0.85), rgba(255, 255, 255, 0.35));*/
  color: #fff;
  padding: 5px 50px 5px 50px;
  display: inline-block;
  text-transform: capitalize;
  cursor: pointer;
  font-size: 16px;
  border-radius: 0px 90px 0px 90px;
}
.button:hover {
  background-color: #fff;
  box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
  text-shadow: none;
  color: #355cc9;
}
.button.return {
  line-height: 3em;
  color: #355cc9;
  border-color: #355cc9;
  text-shadow: none;
  padding: 0px 50px 0px 50px;
}
.button.return:hover {
  background-color: #355cc9;
  color: #fff;
  box-shadow: none;
}

::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #859ddf;
}

::-webkit-scrollbar-thumb:hover {
  background: #355cc9;
}

.slides {
  display: none
}
</style>
<main>
  <!-- 1 -->
  <div class="slider-area position-relative">
    <div class="slider-active aarea">
      <!-- SLIDE 1 -->
      <div class="single-slider slider-height d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
              <div class="hero__caption">
                <span>Smart Campus Database</span>
                <h1 class="cd-headline letters scale">View the graph about 
                  <strong class="cd-words-wrapper">
                    <b class="is-visible">OM-SPAN</b>
                    <b>P.O.K</b>
                    <b>S.A.S</b>
                  </strong>
                </h1>
                <p data-animation="fadeInLeft" data-delay="0.1s" align="justify">
                  <b style="font-size: 20px; color: #000;background-color:#eee;border-radius: 5px 5px 5px 5px;opacity:0.5;">
                    IPDN adalah Lembaga Pendidikan Tinggi Kedinasan dalam lingkungan KEMENDAGRI R.I, yang bertujuan mempersiapkan kader pemerintah, baik di tingkat daerah maupun di tingkat pusat.
                  </b>
                </p>
                <!-- <a href="https://www.ipdn.ac.id/" target="_blank" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">VISITE IPDN <i class="ti-arrow-right"></i></a> -->
              </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block wow zoomIn test">
              <div class="img-place mobile-preview shadow floating-animate">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Lambang_IPDN.png/781px-Lambang_IPDN.png" class="lingkaran-ipdn" alt="">
              </div>          
            </div>
          </div>
        </div>          
      </div>

      <!-- SLIDE 2 -->
      <div class="single-slider slider-height d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
              <div class="hero__caption">
                <span>Smart Campus Database</span>
                <h1 class="cd-headline letters scale">View the graph about 
                  <strong class="cd-words-wrapper">
                    <b class="is-visible">DOSEN</b>
                    <b>PRAJA</b>
                    <b>PEGAWAI</b>
                  </strong>
                </h1>
                <p data-animation="fadeInLeft" data-delay="0.1s" align="justify">
                  <b style="font-size: 20px; color: #000;background-color:#eee;border-radius: 5px 5px 5px 5px;opacity:0.5;">
                    Kementerian Dalam Negeri Republik Indonesia adalah kementerian dalam Pemerintah Indonesia yang membidangi urusan dalam negeri. Kementerian Dalam Negeri berada di bawah dan bertanggung jawab kepada Presiden.
                  </b>
                </p>
                <!-- <a href="https://www.kemendagri.go.id/" target="_blank" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">
                  VISITE KEMENDAGRI R.I 
                  <i class="ti-arrow-right"></i>
                </a> -->
              </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block wow zoomIn test">
              <div class="img-place mobile-preview shadow floating-animate">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Logo_of_the_Ministry_of_Home_Affairs_of_the_Republic_of_Indonesia.svg/1200px-Logo_of_the_Ministry_of_Home_Affairs_of_the_Republic_of_Indonesia.svg.png" class="lingkaran-ipdn" alt="">
              </div>          
            </div>
          </div>
        </div>          
      </div>
      <!-- <img src="assets/page-w3/img/hero/hero_mini-svg.png"> -->
    </div>
  </div>
  <!-- 2 -->
  <div class="department_area section-padding2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-tittle text-center mb-100">
            <span>Oure recent SCDB Graph</span>
            <h2><font style="color: #7e8b97">Smart </font> <font style="color: #0f61ef;">Campus Database</font></h2>
          </div>
        </div>
      </div>
      <div class="dept_main_info white-bg">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row align-items-center no-gutters">
              <div class="col-lg-7">
                <div class="dept_info">
                  <h3 align="justify" id="typedtext">
                  </h3 >
                  <br>
                </div>
              </div>
              <div class="col-lg-5">
                <img src="assets/page-w3/img/hero/01-ok.png" class="slides lingkaran-kep">
                <img src="assets/page-w3/img/hero/02-ok.png" class="slides lingkaran-kep">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 3 -->
  <div class="home_blog-area section-padding30">
    <div class="container">
      <div class="row justify-content-sm-center">
        <div class="cl-xl-7 col-lg-8 col-md-10">
          <div class="section-tittle text-center mb-70">
            <br>
            <br>
            <span>Oure recent news</span>
            <h2><font style="color: #7e8b97">Smart Campus Database</font> <font style="color: #0f61ef;">Graph News</font></h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="wrapper">
          <!-- CARD 1 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard1" class="more" aria-hidden="true">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/8432.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>OM-SPAN</h2>
                  <label for="kadecard1" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>1.58%</span>
                    <div class="icon">
                      <i class="fas fa-chart-pie"></i>
                      <span>OM-SPAN</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>Up</span>
                    <div class="icon">
                      <i class="fas fa-clock"></i>
                      <span>22 Januari 2021</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>8</span>
                    <div class="icon">
                      <i class="  fas fa-globe"></i>
                      <span>Peringkat</span>
                    </div>
                  </div>
                  <a href="load-keuangan.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard1" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- CARD 2 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard22" class="more">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/8432.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>P.O.K</h2>
                  <label for="kadecard22" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>1.60%</span>
                    <div class="icon">
                      <i class="fas fa-chart-pie"></i>
                      <span>OM-SPAN</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>Up</span>
                    <div class="icon">
                      <i class="fas fa-clock"></i>
                      <span>22 Januari 2021</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>8</span>
                    <div class="icon">
                      <i class="  fas fa-globe"></i>
                      <span>Peringkat</span>
                    </div>
                  </div>
                  <a href="load-keuangan.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard22" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- CARD 3 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard222" class="more">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/8432.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>S.A.S</h2>
                  <label for="kadecard222" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>1.66%</span>
                    <div class="icon">
                      <i class="fas fa-chart-pie"></i>
                      <span>OM-SPAN</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>Up</span>
                    <div class="icon">
                      <i class="fas fa-clock"></i>
                      <span>22 Januari 2021</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>8</span>
                    <div class="icon">
                      <i class="  fas fa-globe"></i>
                      <span>Peringkat</span>
                    </div>
                  </div>
                  <a href="load-keuangan.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard222" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- CARD 4 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard2" class="more">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/4012581.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>DATA DOSEN</h2>
                  <label for="kadecard2" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>320</span>
                    <div class="icon">
                      <i class="fas fa-graduation-cap"></i>
                      <span>DOSEN</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>20</span>
                    <div class="icon">
                      <i class="fas fa-graduation-cap"></i>
                      <span>GURU BESAR</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>18</span>
                    <div class="icon">
                      <i class="fas fa-graduation-cap"></i>
                      <span>LEKTOR KEPALA</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>140</span>
                    <div class="icon">
                      <i class="fas fa-graduation-cap"></i>
                      <span>LEKTOR</span>
                    </div>
                  </div>
                  <a href="load-dosen.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard2" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- CARD 5 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard3" class="more">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/4027794.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>DATA PRAJA</h2>
                  <label for="kadecard3" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>7,580</span>
                    <div class="icon">
                      <i class="fas fa-user"></i>
                      <span>TOTAL PRAJA</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>7,580</span>
                    <div class="icon">
                      <i class="fas fa-user"></i>
                      <span>PRAJA AKTIF</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>0</span>
                    <div class="icon">
                      <i class="fas fa-user"></i>
                      <span>PRAJA CUTI</span>
                    </div>
                  </div>
                  <a href="load-praja.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard3" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- CARD 6 -->
          <div class="kadecard">
            <input type="checkbox" id="kadecard4" class="more">
            <div class="content">
              <div class="front" style="background-image: url('assets/page-w3/img/gallery/bg/4379.jpg');border-radius: 0px 90px 0px 90px;">
                <div class="inner">
                  <h2>DATA KEPEGAWAIAN</h2>
                  <label for="kadecard4" class="button" aria-hidden="true">
                    Details
                  </label>
                </div>
              </div>
              <div class="back">
                <div class="inner">
                  <div class="info">
                    <span>3,650</span>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                      <span>TOTAL PEGAWAI</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>3,105</span>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                      <span>PNS</span>
                    </div>
                  </div>
                  <div class="info">
                    <span>545</span>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                      <span>NON-PNS</span>
                    </div>
                  </div>
                  <a href="load-kepegawaian.php" class="location" target="_blank">Lihat Detail <i class="fas fa-share-alt"></i></a>
                  <label for="kadecard4" class="button return" aria-hidden="true">
                    <i class="fas fa-arrow-left"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 4 -->
  <div class="about-area section-padding2">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-10">
          <div class="about-caption mb-50">
            <div class="section-tittle section-tittle2 mb-35">
              <span>About Our Smart Campus Database</span>
              <h2><font style="color: #7e8b97">Smart Campus</font> <font style="color: #0f61ef;">Database</font></h2>
            </div>
            <p align="justify" id="typedtextdua"></p>
            <div class="about-btn1 mb-30">
              <a href="http://scdb.ipdn.ac.id/" target="_blank" class="btn about-btn">Visite SCDB System .<i class="ti-arrow-right"></i></a>
            </div>
            <br>
            <br>
            <br>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="about-img ">
            <div class="about-font-img d-none d-lg-block">
              <img src="assets/page-w3/img/gallery/about2.png" alt="">
            </div>
            <div class="about-back-img ">
              <img src="assets/page-w3/img/gallery/about1.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 5 -->
  <div class="gallery-area section-padding30" style="background-image: url('assets/page-w3/img/gallery/department.png');background-repeat: no-repeat;background-position: center center;background-size: cover;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-tittle text-center mb-100">
            <br>
            <br>
            <span>Our Gallery</span>
            <h2><font style="color: #7e8b97">Smart Campus </font> <font style="color: #0f61ef;">Database Gallery</font></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-gallery mb-30">
                <div class="gallery-img big-img" style="background-image: url(assets/page-w3/img/gallery/01.jpeg);"></div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(assets/page-w3/img/gallery/02.jpeg);"></div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(assets/page-w3/img/gallery/03.jpeg);"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(assets/page-w3/img/gallery/04.jpeg);"></div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(assets/page-w3/img/gallery/05.jpeg);"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-gallery mb-30">
                <div class="gallery-img big-img" style="background-image: url(assets/page-w3/img/gallery/06.jpeg);"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 6 -->
  <div class="home_blog-area section-padding30">
    <div class="container">
      <div class="row justify-content-sm-center">
        <div class="cl-xl-7 col-lg-8 col-md-10">
          <!-- Section Tittle -->
          <div class="section-tittle text-center mb-70">
            <br>
            <br>
            <span>Oure recent news</span>
            <h2><font style="color: #7e8b97">Smart Campus </font> <font style="color: #0f61ef;">Database News</font></h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="single-blogs mb-30">
            <div class="blog-img">
              <img src="assets/page-w3/img/gallery/blog1.png" alt="">
            </div>
            <div class="blogs-cap">
              <div class="date-info">
                <span>PRAJA</span>
                <p>Nov 30, 2020</p>
              </div>
              <h4><a href="notfound.php">Praja use Smart Campus Database</a></h4>
              <a href="notfound.php" class="read-more1">Read more</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="single-blogs mb-30">
            <div class="blog-img">
              <img src="assets/page-w3/img/gallery/blog2.png" alt="">
            </div>
            <div class="blogs-cap">
              <div class="date-info">
                <span>SPAN</span>
                <p>Nov 30, 2020</p>
              </div>
              <h4><a href="notfound.php">View Smart Campus Database System</a></h4>
              <a href="notfound.php" class="read-more1">Read more</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="single-blogs mb-30">
            <div class="blog-img">
              <img src="assets/page-w3/img/gallery/blog3.png" alt="">
            </div>
            <div class="blogs-cap">
              <div class="date-info">
                <span>Pegawai</span>
                <p>Nov 30, 2020</p>
              </div>
              <h4><a href="notfound.php">Smart Campus Database Development</a></h4>
              <a href="notfound.php" class="read-more1">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>