@extends('layouts.app')
@section('content')
<style>
    /* about-1 start */
    .hero-about-1{
        height: 500px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.559), rgba(0, 0, 0, 0.616)), url(../img/acara/bgabt.jpg);
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    /* about-1 end */
</style>

<!-- ini hero -->
<section class="hero-about-1">
    <div class="container h-100">
        <div class="row h-100 justify-content-center">
            <div class="col-sm-6 my-auto">
                <p class="text-center my-auto" style="color: #e9e9e9; font-weight:700; font-size:32px;">About E-tics</p>
            </div>
        </div>
    </div>
</section>
<!-- akhir hero -->

<section style="background-color: #f3f3f3; margin-top: 50px; margin-bottom: 50px; padding-top: 50px; padding-bottom: 50px;">
    <!-- ini content 1 -->
    <div class="about-1">
        <div class="container">
            <div class="head mb-2">
                <div class="text-center">
                    <p class="m-0" style="font-size: 34px; font-weight: 700;">E-tics</p>
                    <p>simple way to find tickets</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-5">
                    <img src="{{asset('img/acara/sideman.png')}}" class="img img-fluid" alt="">
                </div>
                <div class="col-md-6 my-auto">
                    <div class="font">
                        <div class="head">
                            <p style="font-size: 32px; font-weight: 550;">HISTORY</p>
                        </div>
                        <div class="body">
                            <p>
                                etics adalah website tiketing konser yang dikembangkan menggunakan framework laravel 8
                                <br>
                                <br>
                                berawal dari sebuah project ukk dari sekolah yang mengharuskan untuk mengerjakan sebuah website tiketing, lahirlah website E-tics ini,
                                dengan etics memungkinkan pengguna yang ingin mencari tiket konser dimudahkan dengan menggunakan etics, pengguna bisa melakukan pembelian tiket dan juga riset tentang acara yang akan diselenggarakan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir content 1 -->

    <!-- ini content 2 -->
    <div class="about-2 mt-5">
        <div class="container">
            <div class="header">
                <div class="text-center">
                    <p style="font-size: 28px; font-weight: 500;">
                        About me
                    </p>
                </div>
            </div>
            <div class="body my-4">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="text-center">
                            <div class="gambar">
                                <img src="{{asset('img/avatar/me.jpg')}}" class="img img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="font text-center">
                            <div class="font mt-3">
                                <p class="mb-0" style=" font-size: 17px;font-weight: 600;">Ahma Afrizal</p>
                                <p class="mt-0">a student who likes design pages and also make simple code</p>
                                <p class="mb-0">my social media :</p>
                                <p class="mt-1">
                                    <a href="https://www.facebook.com/ahma.afrizal/" target="_blank" class="link link-dark text-decoration-none mx-2">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/AfrizalAhma" target="_blank" class="link link-dark text-decoration-none mx-2">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="mailto: afrizalahma5@gmail.com" target="_blank" class="link link-dark text-decoration-none mx-2">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                    <a href="https://github.com/AhmaAfrizal" target="_blank" class="link link-dark text-decoration-none mx-2">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                    <a href="https://instagram.com/ahma_zx05?igshid=ZDdkNTZiNTM=" target="_blank" class="link link-dark text-decoration-none mx-2">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir content 2 -->
</section>
@endsection
