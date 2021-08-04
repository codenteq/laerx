@extends('user.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Online Sınavlarım</h2>
                </blockquote>
                <figcaption>
                    <span><a href="/user/dashboard"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Online Sınavlarım</span>
                </figcaption>
            </figure>
            <div class="container align-content-center">
                <div class="row">
                    <div class="col-9">
                        <h4 class="text-start">Kullanım Kılavuzu</h4>
                        <hr>
                        <ul>
                            <li>
                                Lütfen kimlik bilgilerinizi yukarıdan kontrol ediniz.
                            </li>
                            <li>
                                Elektronik ehliyet sınavlarına gireceklere: 12 İlk yardım sorusu, 23 Trafik sorusu, 9 Motor sorusu ve 6 Trafik adabı sorusu olmak üzere 50 soru sorulmaktadır.
                            </li>
                            <li>
                                Elektronik ehliyet sınavı 45 dakikadır.
                            </li>
                            <li>
                                4 yanlış bir doğruyu götürmemektedir ve tüm ehliyet sınıfları için sorular aynıdır.
                            </li>
                            <li>
                                Adayların başarılı olabilmesi için toplam 50 sorudan oluşan yeni müfredat ehliyet sınavından 35 soruyu doğru cevaplaması ve toplam 70 puan almaları gerekmektedir.
                            </li>
                            <li>
                                Sınavı bitir butonuna tıklamadan sınav salonundan ayrılmayınız.
                            </li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kılavuzu okudum ve anladım.<br>
                                    <small style="color: red">Normal sınava girmek için kutucuğu işaretleyiniz!</small>
                                </label>
                            </div>
                        </ul>
                    </div>
                    <div class="col-4 exams">
                        <div class="p-3 border bg-primary text-light rounded-3">
                            <h3>Normal Sınav</h3><br>
                            <small>Meb sınavına uygun soru ve kategoriler için</small>
                        </div>
                    </div>
                    <div class="col-4 exams">
                        <div class="p-3 border bg-success text-light rounded-3">
                            <h3>Özel Sınav</h3><br>
                            <small>Hangi konudan kaç soru ile sınava gireceğini kendin seç</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Online Sınavlarım</title>

@endsection

@section('css')

@endsection

@section('js')

@endsection
