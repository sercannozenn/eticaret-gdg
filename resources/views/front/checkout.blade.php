@extends("layouts.front")

@section("title", "Ödeme Sayfası")

@push("css")
@endpush

@section("body")
    <main>
        <div class="container shadow p-5">
            <div class="row">
                <div class="col-md-9 order-detail-wrapper">
                    <h6>SİPARİŞ BİLGİLERİ</h6>
                    <form action="">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active"
                                   aria-current="page"
                                   data-bs-toggle="tab"
                                   href="#adresBilgileri">
                                    Adres Bilgileri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   aria-current="page"
                                   data-bs-toggle="tab"
                                   href="#odemeBilgileri">
                                    Ödeme Bilgileri
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="adresBilgileri">
                                <div class="row pt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">* AD
                                            <input type="text" id="name">
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastname">* SOYAD
                                            <input type="text" id="lastname">
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city">* İL
                                            <select id="city">
                                                <option value="">Ankara</option>
                                                <option value="">İzmir</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="district">* İLÇE
                                            <select id="district">
                                                <option value="">Ankara</option>
                                                <option value="">İzmir</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">* TELEFON
                                            <input type="text" id="phone">
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="postCode">POSTA KODU
                                            <input type="text" id="postCode">
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="address">* ADRES
                                            <textarea id="address" cols="30" rows="5"></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="odemeBilgileri">
                                <div class="row pt-3">
                                    <div class="col-md-12 mb-3">
                                        <label for="cardNumber">* KART NUMARASI
                                            <input type="text" id="cardNumber">
                                        </label>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="card-date">* SON KULLANMA TARİHİ</label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="" id="card-date">
                                                    <option value="" disabled>Ay</option>
                                                    <option value="" >01</option>
                                                    <option value="" >02</option>
                                                    <option value="" >03</option>
                                                    <option value="" >04</option>
                                                    <option value="" >05</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="" id="card-year">
                                                    <option value="" disabled>Yıl</option>
                                                    <option value="" >2024</option>
                                                    <option value="" >2025</option>
                                                    <option value="" >2026</option>
                                                    <option value="" >2027</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="cvv">* CVV <i class="bi bi-info-circle"
                                                                  data-bs-toggle="tooltip"
                                                                  data-bs-placement="top"
                                                                  data-bs-title="Kartınızın arka yüzündeki son üç rakam"
                                            ></i>
                                            <input type="text" id="cvv">
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 basket-detail shadow py-3">
                    <a href="" class="btn bg-orange text-white w-100 btn-approve-basket">
                        Ödeme Yap <i class="bi bi-chevron-right"></i>
                    </a>
                    <div class="grand-total mt-4">
                        <p>Ürünün Toplamı: <span class="pull-right">599,70 TL</span></p>
                        <p>Kargo Ücreti: <span class="pull-right">30,00 TL</span></p>
                        <p>İndirim Kodu:
                            <br>
                            #Sepette30 <span class="pull-right">30.00 TL</span>
                        </p>

                        <p><strong>TOPLAM: </strong> <span class="pull-right">599,70 TL</span></p>
                    </div>

                    <div class="contract shadow p-4 mt-4">
                        <label for="contract">
                            <input type="checkbox" id="contract">
                        </label>
                        <div>
                            <a href="javascript:void(0)"
                               data-bs-toggle="modal"
                               data-bs-target="#contractModal">Ön Bilgilendirme Koşulları</a>'nı ve
                            <a href="javascript:void(0)"
                               data-bs-toggle="modal"
                               data-bs-target="#contractModal">Satış Sözleşmesi</a>'ni okudurm, onaylıyorum.
                        </div>
                    </div>

                    <a href="" class="btn bg-orange text-white w-100 btn-approve-basket mt-4">
                        Ödeme Yap <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>
    </main>

    <div class="modal fade" id="contractModal" tabindex="-1" aria-labelledby="contractModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contractModalLabel">Sözleşmeler ve Formlar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-wrapper">
                        <h5>Ön Bilgilendirme Formu</h5>
                        <div class="contracts-text-wrapper">
                            <div class="contract-text mx-auto">
                                <h3 class="pre-contract-h3 pre-contract-title">ÖN BİLGİLENDİRME FORMU</h3>
                                <h3 class="pre-contract-h3">1. <span>TARAFLAR VE KONU</span></h3>
                                <p>İşbu Ön Bilgilendirme Formu’nun konusu, Alıcı ve Satıcı arasındaki Sözleşme’ye ilişkin
                                    Kanun ve Yönetmelik hükümleri uyarınca bilgilendirilmesidir. Ayrıca Yönetmelik uyarınca
                                    yer verilmesi zorunlu olan hususlar Ön Bilgilendirme Formu’nda yer almaktadır.</p>
                                <p>ALICI, Ön Bilgilendirme Formu ve Sözleşme’ye ilişkin bilgileri üyeliğinin bağlı olduğu
                                    “Hesabım” sayfasından takip edebilecek olup değişen bilgilerini bu sayfa üstünden
                                    güncelleyebilecektir. Ön Bilgilendirme Formu ve Sözleşme’nin bir nüshası Alıcı’nın
                                    üyelik hesabında mevcuttur ve talep edilmesi halinde ayrıca elektronik posta ile de
                                    gönderilebilecektir.</p>
                                <h3 class="pre-contract-h3">2. <span>TANIMLAR</span></h3>
                                <p>Ön Bilgilendirme Formu ve Sözleşme’nin uygulanmasında ve yorumlanmasında aşağıda yazılı
                                    terimler karşılarındaki yazılı açıklamaları ifade edeceklerdir.</p>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>ALICI</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">Bir Mal veya Hizmet’i ticari veya mesleki
                                            olmayan amaçlarla edinen, kullanan veya yararlanan gerçek kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Bakanlık</strong></td>
                                        <td>:</td>
                                        <td>Türkiye Cumhuriyeti Ticaret Bakanlığı’nı,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Banka</strong></td>
                                        <td>:</td>
                                        <td>5411 sayılı Bankacılık Kanunu uyarınca kurulan lisanslı kuruluşları,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>DSM veya Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı</strong></td>
                                        <td>:</td>
                                        <td>Oluşturduğu sistem ile Satıcı’nın Ürün/Hizmet’i satışa sunduğu Platform’u
                                            işleten ve Satıcı adına mesafeli sözleşme kurulmasına aracılık eden DSM Grup
                                            Danışmanlık İletişim ve Satış Ticaret Anonim Şirketi’ni,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Hizmet</strong></td>
                                        <td>:</td>
                                        <td>Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen Ürün
                                            sağlama dışındaki her türlü tüketici işleminin konusunu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kanun</strong></td>
                                        <td>:</td>
                                        <td>6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi</strong></td>
                                        <td>:</td>
                                        <td>Ürün’ün Alıcı’ya ulaştırılmasını, iade süreçlerinde Alıcı’dan alınarak Satıcı
                                            veya DSM’ye ulaştırılmasını sağlayan anlaşmalı kargo veya lojistik şirketini,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ön Bilgilendirme Formu</strong></td>
                                        <td>:</td>
                                        <td>Sözleşme kurulmadan ya da buna karşılık herhangi bir teklif Alıcı tarafından
                                            kabul edilmeden önce Alıcı’yı Yönetmelik’te belirtilen asgari hususlar konusunda
                                            bilgilendirmek için hazırlanan formu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Platform</strong></td>
                                        <td>:</td>
                                        <td>DSM’ye ait www.trendyol.com adlı internet sitesini ve mobil uygulamasını,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı</strong></td>
                                        <td>:</td>
                                        <td>Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla
                                            tüketiciye Ürün/Hizmet sunan ya da Ürün/Hizmet sunanın adına ya da hesabına
                                            hareket eden ve aşağıda bilgileri bulunan gerçek ve/veya tüzel kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sözleşme</strong></td>
                                        <td>:</td>
                                        <td>Satıcı ve Alıcı arasında akdedilen Sözleşme’yi,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Trendyol Teslimat Noktası</strong></td>
                                        <td>:</td>
                                        <td>Alıcı’nın satın aldığı Ürünler’i kolayca teslim alabildiği anlaşmalı esnaf
                                            noktalarını, kargo şubelerini ve zincir mağazalarını,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ürün</strong></td>
                                        <td>:</td>
                                        <td>Alışverişe konu olan taşınır eşya, konut veya tatil amaçlı taşınmaz mallar ile
                                            elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri
                                            her türlü gayri maddi malı,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Yönetmelik</strong></td>
                                        <td>:</td>
                                        <td>Mesafeli Sözleşmeler Yönetmeliği’ni ifade eder.</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">3. <span>ALICI, SATICI VE ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI</span>
                                </h3>
                                <h3 class="distant-contract-h3">ALICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong>
                                        </td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Telefon</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Faks</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>E-posta/Kullanıcı Adı</strong></td>
                                        <td>:</td>
                                        <td>srcn.ozn5@gmail.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">SATICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Satıcının Ticaret Unvanı / Adı ve
                                                Soyadı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">TAMER ELEKTRİK İMALAT SANAYİ VE TİCARET
                                            LİMİTED ŞİRKETİ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Adresi</strong></td>
                                        <td>:</td>
                                        <td>ELEKTROKENT İŞ MERKEZİ 1467.CD NO:2/29
                                            İVEDİK O.S.B./OSTİM/ANKARA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0817002865600014</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>8170028656</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Telefonu</strong></td>
                                        <td>:</td>
                                        <td>5398474797</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>5398474797</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı KEP ve E-posta Bilgileri</strong></td>
                                        <td>:</td>
                                        <td>tamerelektrik@hs01.kep.tr</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı Unvanı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">DSM Grup Danışmanlık İletişim ve Satış
                                            Ticaret A.Ş.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Adresi</strong></td>
                                        <td>:</td>
                                        <td>Maslak Mahallesi Saat Sokak Spine Tower No:5 iç kapı:19 Sarıyer İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0313055766900016</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>Maslak VD- 3130557669</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Telefonu</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>0 212 332 18 93</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Şikâyet/Öneri Kanalları</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200 telefon numarası üzerinden ve Platform’da yer alan “Trendyol
                                            Asistan’a Sor” başlıklı alandan şikayet ve öneriler iletilebilecektir.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">4. <span>ÜRÜN/HİZMET BİLGİLERİ</span></h3>
                                <p><b>4.1.</b> Ürün/Hizmet’in temel özellikleri (türü, miktarı, marka/modeli, rengi, adedi,
                                    fiyatı) Platform’da yer almakta olup Platform üzerinden detaylı şekilde
                                    incelenebilecektir.</p>
                                <p><b>4.2.</b> Ürün/Hizmet karşılığında ödenecek tüm tutarlar (tüm vergiler dahil satış
                                    fiyatı, kargo bedeli, taksit farkı tutarı, açık pazar ve/veya diğer butiklerinden eş
                                    zamanlı olarak gerçekleştirilen alışverişlerde hak kazanılan toplam indirim tutarı vb.)
                                    aşağıdaki tabloda gösterilmiştir.</p>
                                <div style="margin-bottom:15px">
                                    <table class="pre-contract-main-table pre-contract-tables" style="width:100%">
                                        <tbody>
                                        <tr>
                                            <th>Ürün/Hizmet Açıklaması</th>
                                            <th>Adet</th>
                                            <th>Peşin Fiyatı</th>
                                            <th>Ara Toplam (KDV Dahil)</th>
                                        </tr>
                                        <tr>
                                            <td>Siyah Set Multi-let 6'lı Topraklı Çocuk Korumalı Grup Priz-3 Metre + 3'lü
                                                Yonca Fiş-priz
                                            </td>
                                            <td>1</td>
                                            <td>309.33 TL</td>
                                            <td>309.33 TL</td>
                                        </tr>
                                        <tr>
                                            <td>Kargo Tutarı</td>
                                            <td>-</td>
                                            <td>0.92 TL</td>
                                            <td>0.92 TL</td>
                                        </tr>
                                        <tr>
                                            <td>200 TL ve Üzeri Kargo Bedava (Satıcı Karşılar)</td>
                                            <td>-</td>
                                            <td>0.92 TL</td>
                                            <td>0.92 TL</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Toplam</td>
                                            <td>309.33 TL</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Kargo Hariç Toplam Ürün
                                                Bedeli</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">309.33 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Ücreti</strong></td>
                                        <td>:</td>
                                        <td>0.92 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Taksit Farkı</strong></td>
                                        <td>:</td>
                                        <td>0 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Toplam Sipariş Bedeli</strong></td>
                                        <td>:</td>
                                        <td>309.33 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ödeme Şekli ve Planı</strong></td>
                                        <td>:</td>
                                        <td>Tek Çekim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong></td>
                                        <td>:</td>
                                        <td>Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Fatura Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sipariş Tarihi</strong></td>
                                        <td>:</td>
                                        <td>21.2.2024</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Şekli</strong></td>
                                        <td>:</td>
                                        <td>Alıcıya Teslim veya Trendyol Teslimat Noktasına noktasına teslim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Süresi*</strong></td>
                                        <td>:</td>
                                        <td>En geç 30 gün</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi’ne Teslim Süresi**</strong>
                                        </td>
                                        <td>:</td>
                                        <td>2024-02-21</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>Teslim Şartları ürün sayfasında belirtildiği şekilde uygulanacaktır.</b></p>
                                <p>*Sözleşme ve ilgili mevzuat hükümlerinde yer alan istisnalar saklıdır.<br>**Belirtilen
                                    süre teslimatın taahhüdü değildir, satıcı tarafından kargo şirketine teslim edilme
                                    süresini ifade eder.</p>
                                <p><b>4.3. </b>SÖZ KONUSU ÜRÜN BEDELİ, “TRENDYOL ALICI GÜVENCESİ” KAPSAMINDA SATICI ADINA,
                                    DSM TARAFINDAN ALICI’DAN TAHSİL EDİLMEKTEDİR. ALICI MALIN BEDELİNİ DSM'YE ÖDEMEKLE, ÜRÜN
                                    BEDELİNİ SATICI’YA ÖDEMİŞ SAYILACAK VE BİR DAHA ÖDEME YÜKÜMLÜLÜĞÜ ALTINA GİRMEYECEKTİR.
                                    ALICI’NIN İLGİLİ MEVZUAT KAPSAMINDA İADE HAKLARI SAKLIDIR.</p>
                                <p><b>4.4. </b>KDV dahil satış fiyatı 45 TL olup, sepette yalnızca bir tane alınabilen
                                    Trendyol Pass, siparişten itibaren bir (1) ay boyunca geçerli olan 10 kargo hakkı
                                    sağlayan bir pakettir ve DSM tarafından sağlanmaktadır. Siparişten itibaren bir ayın
                                    sonunda kullanmamış olduğunuz, kalan haklarınızın geçerliliği sona erecek ve bir sonraki
                                    aya aktarılamayacaktır. Sepetinizde Trendyol Pass bulunması veya daha önce satın almış
                                    olduğunuz Trendyol Pass haklarınızın hala geçerli olması durumunda, kargo ücreti
                                    Trendyol Pass haklarınızdan mahsup edilecek olup, söz konusu siparişi ürünün kargoya
                                    verilmesini takiben sepetinizdeki ürünlerden herhangi birini iade etmeniz halinde
                                    Mesafeli Sözleşmeler Yönetmeliği’nin 15/1(h) maddesi çerçevesinde Trendyol Pass’e
                                    ilişkin cayma hakkınızı kullanamayacağınız için söz konusu siparişte kullanmış olduğunuz
                                    Trendyol Pass hakkınız veya Trendyol Pass ücreti tarafınıza iade edilemeyecektir.</p>
                                <h3 class="pre-contract-h3">5. <span>GENEL HÜKÜMLER</span></h3>
                                <p><b>5.1.</b> Satıcı, Ürün/Hizmet’i eksiksiz, siparişte belirtilen niteliklere uygun ve
                                    varsa garanti belgeleri, kullanım kılavuzları ile mevzuat gereği Ürün/Hizmet’le birlikte
                                    teslim etmesi gereken sair bilgi ve belgeler ile teslim etmeyi kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.2.</b> Ürün, Alıcı veya Alıcı tarafından belirlenen üçüncü kişiye, taahhüt edilen
                                    teslim süresi içerisinde ve her halükârda 30 (otuz) günlük yasal süreyi aşmamak koşulu
                                    ile, Alıcı’nın Platform’da belirtmiş olduğu teslimat adresine Kargo Şirketi tarafından
                                    teslim edilir. Bu süre içerisinde Satıcı’nın edimini yerine getirmemesi durumunda Alıcı
                                    Sözleşme'yi feshedebilecektir. Ancak Alıcı’nın isteği veya kişisel ihtiyaçları
                                    doğrultusunda hazırlanan Ürün/Hizmet satışlarında teslim süresi ilgili 30 (otuz) günü
                                    aşabilecektir. Ayrıca, sipariş durumu “Ön Sipariş” veya “Sipariş Üzerine Üretim” olarak
                                    belirtilen Ürün/Hizmet için teslimat süresi de 30 (otuz) günü aşabilecek olup Alıcı,
                                    Alıcı’nın isteği veya kişisel ihtiyaçları doğrultusunda hazırlanan “Sipariş Üzerine
                                    Üretim” ya da “Ön Sipariş” statüsünde olan bir Ürün/Hizmet satın aldığında teslimatın 30
                                    (otuz) gün içerisinde yapılmaması dolayısıyla Sözleşme’yi feshedemeyecektir.</p>
                                <p><b>5.3.</b> Satıcı Ürün’ü Kargo Şirketi aracılığı ile Alıcı’ya göndermekte ve teslim
                                    ettirmektedir. Kargo Şirketi’nin Alıcı’nın bulunduğu yerde şubesi olmaması halinde
                                    Alıcı’nın Ürün’ü Kargo Şirketi’nin Satıcı tarafından bildirilen yakın bir diğer
                                    şubesinden teslim alması gerekmektedir.</p>
                                <p><b>5.4.</b> Alıcı’nın sipariş esnasında Ürün’ü Trendyol Teslimat Noktası’na teslim
                                    edilmesini seçmesi halinde, Ürün, Kargo Şirketi tarafından Alıcı’nın seçmiş olduğu
                                    teslimat noktasına taahhüt edilen süre içerisinde ve her halükârda en geç 30 (otuz)
                                    günlük yasal süre içerisinde teslim edilecektir. Ürün’ün Trendyol Teslimat Noktası’na
                                    bırakılmasının ardından Alıcı, seçmiş olduğu teslimat adresi bilgilerinde kayıtlı olan
                                    telefon numarasına gelen kod ile en geç 3 (üç) gün içerisinde Ürün’ü teslim alacaktır.
                                </p>
                                <p><b>5.5.</b> Alıcı’nın herhangi bir nedenle Ürün/Hizmet’i teslim almaması halinde,
                                    Alıcı’nın Ürün/Hizmet’i iade ettiği kabul edilecek olup bu halde, varsa teslimat
                                    masrafları da dâhil olmak üzere Alıcı’dan tahsil edilen tüm ödemeler yasal süresi
                                    içerisinde Alıcı’ya iade edilecektir.</p>
                                <p><b>5.6.</b> Alıcı veya Alıcı tarafından belirlenen üçüncü kişinin teslim anında adreste
                                    bulunmaması durumunda Alıcı'nın Ürün/Hizmet’i geç teslim almasından ve/veya hiç teslim
                                    almamasından kaynaklanan zararlardan ve giderlerden Satıcı sorumlu değildir.</p>
                                <p><b>5.7.</b> Ürün/Hizmet’in teslimat masrafları aksine bir hüküm yoksa Alıcı’ya aittir.
                                    Satıcı, Platform’da teslimat ücretinin kendisince karşılanacağını beyan etmişse teslimat
                                    masrafları Satıcı'ya ait olacaktır.</p>
                                <p><b>5.8.</b> Satıcı, Sözleşme'den doğan ifa yükümlülüğünün süresi dolmadan Alıcı’yı
                                    Platform üzerinden bilgilendirmek ve açıkça onayını almak suretiyle muadil bir
                                    Ürün/Hizmet tedarik edebilecektir.</p>
                                <p><b>5.9.</b> Ürün/Hizmet ediminin yerine getirilmesinin imkansızlaştığı hallerde
                                    Satıcı’nın bu durumu öğrendiği tarihten itibaren 3 (üç) gün içinde Alıcı’ya yazılı
                                    olarak veya veri saklayıcısı ile bildirmesi ve varsa teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeleri bildirim tarihinden itibaren en geç 14 (ondört) gün
                                    içinde iade etmesi zorunludur. Ürün/Hizmet’in stokta bulunmaması durumu, Ürün/Hizmet
                                    ediminin yerine getirilmesinin imkânsızlaşması olarak kabul edilmez.</p>
                                <p><b>5.10.</b> Alıcı, Ürün’ü teslim almadan önce muayene edecek; ezik, kırık, ambalajı
                                    yırtılmış vb. hasarlı, ayıplı veya eksik Ürün/Hizmet’i teslim almayacaktır. Teslim
                                    alınan Ürün/Hizmet’in hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra
                                    Ürün’ün özenle korunması borcu, Alıcı’ya aittir. Cayma hakkı kullanılacaksa Ürün/Hizmet
                                    kullanılmamalı ve Ürün/Hizmet faturası ve teslim sırasında Alıcı’ya iletilen diğer tüm
                                    belgeler (örneğin garanti belgesi, kullanım kılavuzu vb.) ile birlikte iade edilmesi
                                    gerekmektedir.</p>
                                <p><b>5.11.</b> Alıcı, Sözleşme konusu bedeli ödemekle yükümlü olup, herhangi bir nedenle
                                    Sözleşme konusu bedelin ödenmemesinin ve/veya Banka kayıtlarında iptal edilmesinin
                                    Satıcı’nın Ürün/Hizmet’i teslim yükümlülüğü ile Sözleşme’den kaynaklanan sair
                                    yükümlülüklerinin sona ereceğini kabul, beyan ve taahhüt eder. Alıcı, herhangi bir
                                    sebeple Banka tarafından başarısız kodu gönderilen ancak buna rağmen Banka tarafından
                                    Satıcı’ya yapılan ödemelere ilişkin olarak, Satıcı’nın herhangi bir sorumluluğunun
                                    bulunmadığını kabul, beyan ve taahhüt eder.</p>
                                <p><b>5.12.</b> Alıcı, Ürün’ün teslim edilmesinden sonra Alıcı’ya ait kredi kartının
                                    yetkisiz kişilerce haksız kullanılması sonucunda Sözleşme konusu bedelin ilgili Banka
                                    tarafından Satıcı’ya ödenmemesi halinde, Alıcı Ürün’ü 3 (üç) gün içerisinde iade
                                    masrafları Alıcı’ya ait olacak şekilde Satıcı’ya iade edeceğini kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.13.</b> Sözleşme kapsamında herhangi bir nedenle Alıcı’ya bedel iadesi yapılması
                                    gereken durumlarda, Alıcı, ödemeyi kredi kartı ile yapmış olması halinde, Satıcı
                                    tarafından kredi kartına iade edilen tutarın banka tarafından Alıcı hesabına
                                    yansıtılmasına ilişkin ortalama sürecin 2 (iki) ile 3 (üç) haftayı bulabileceğini, bu
                                    tutarın Satıcı tarafından Banka’ya iadesinden sonra Alıcı’nın hesaplarına yansıması
                                    halinin tamamen Banka işlem süreci ile ilgili olduğunu ve olası gecikmelerde Banka’nın
                                    sorumlu olduğunu ve bunlar için DSM’yi ve Satıcı’yı sorumlu tutamayacağını kabul, beyan
                                    ve taahhüt eder.</p>
                                <p><b>5.14.</b> Alıcı ile sipariş esnasında kullanılan kredi kartı hamilinin aynı kişi
                                    olmaması veya Ürün/Hizmet’in Alıcı’ya tesliminden evvel, siparişte kullanılan kredi
                                    kartına ilişkin güvenlik açığı tespit edilmesi halinde, kredi kartı hamiline ilişkin
                                    kimlik ve iletişim bilgilerini, siparişte kullanılan kredi kartının bir önceki aya ait
                                    ekstresini yahut kart hamilinin Banka’dan kredi kartının kendisine ait olduğuna ilişkin
                                    yazıyı ibraz etmesini Alıcı’dan talep edilebilecektir. Alıcı’nın talebe konu
                                    bilgi/belgeleri temin etmesine kadar geçecek sürede sipariş dondurulacak olup, söz
                                    konusu taleplerin 24 (yirmidört) saat içerisinde karşılanmaması halinde ise Satıcı,
                                    siparişi iptal etme hakkını haizdir.</p>
                                <p><b>5.15.</b> Alıcı Sözleşme konusu bedeli Trendyol Cüzdan aracılığıyla ödemesi ve bu
                                    siparişe ilişkin cayma hakkını kullanması halinde cayma hakkından kaynaklı bedel iadesi
                                    Trendyol Cüzdan’a tek seferde yapılabilecektir.</p>
                                <p><b>5.16.</b> Sipariş edilmeyen Ürün/Hizmet’in gönderilmesi durumunda, Alıcı’ya karşı
                                    herhangi bir hak ileri sürülemez. Bu hallerde, Alıcı’nın sessiz kalması ya da söz konusu
                                    Ürün/Hizmet’i kullanmış olması, sözleşmenin kurulmasına yönelik kabul beyanı olarak
                                    yorumlanamaz.</p>
                                <p><b>5.17.</b> Alıcı’nın sipariş edebileceği Ürün/Hizmet adetlerine Platform’dan yapılacak
                                    duyurularla kısıt getirilebilir. Alıcı’nın Platform’dan yapılan duyurularda belirtilen
                                    adedin üzerinde Ürün/Hizmet sipariş etmek istemesi halinde sipariş vermesi
                                    engellenebilecek, siparişi verdikten sonra belirtilen adedin üstünde sipariş verdiğinin
                                    tespit edilmesi halinde ise belirtilen adedin üstündeki siparişleri iptal edilebilecek
                                    ve bu halde varsa iptal edilen siparişlere ilişkin teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeler yasal süresi içerisinde Alıcı’ya iade edilecektir.
                                    Alıcı işbu hususları kabul ederek siparişini oluşturduğunu, adet sınırlamasını geçen
                                    siparişlerinin engellenebileceği ve iptal edilebileceğini kabul, beyan ve taahhüt eder.
                                </p>
                                <p><b>5.18.</b> Satıcı’nın herhangi bir sebeple tedarik edemediği siparişler, Alıcı’nın
                                    onayının alınması halinde, mevzuattaki yasal teslim süresini aşmamak ve Alıcı’nın
                                    Ürün/Hizmet ile aynı özellikleri haiz olmak kaydıyla, bir başka satıcıya
                                    aktarılabilecektir. Böyle bir durumda Ürün/Hizmet yeni satıcı tarafından Alıcı’ya
                                    gönderilecek olup Sözleşme yeni satıcı ile Alıcı arasında kurulmuş olacaktır. Bu halde,
                                    Alıcı’ya herhangi bir ek bedel, ücret ve/veya masraf yansıtılmayacaktır.</p>
                                <p><b>5.19.</b> Alıcı tüketici sıfatıyla talep, şikayet ve önerilerini yukarıda yer alan
                                    Satıcı iletişim bilgilerini kullanmak suretiyle ve/veya Platform’un sağladığı kanallarla
                                    (0 212 331 0 200 telefon numarası üzerinden ve “Trendyol Asistan’a Sor” başlıklı
                                    alandan) ulaştırabilecektir.</p>
                                <h3 class="pre-contract-h3">6. <span>ÖZEL ŞARTLAR</span></h3>
                                <p><b>6.1.</b> Alıcı, aksi belirtilmedikçe, Platform’da birden fazla butikten tek bir
                                    sepette alışveriş yapabilecektir. Aynı sepet içerisinde farklı butikten alınan her bir
                                    Ürün/Hizmet için Satıcı tarafından birden fazla fatura kesilebilecektir. Şüpheye mahal
                                    bırakmamak bakımından belirtilmelidir ki, Satıcı, Alıcı’nın farklı butiklerden aldığı
                                    Ürün/Hizmet’in teslimatını mevzuattaki yasal süre içerisinde kalmak koşuluyla farklı
                                    zamanlarda gerçekleştirebilecektir.</p>
                                <p><b>6.2.</b> Alıcı’nın vereceği siparişlerde kurumsal fatura seçeneğini seçmesi durumunda
                                    Satıcı, Alıcı tarafından Platform üzerinden bildirilecek vergi kimlik numarası ve vergi
                                    dairesi bilgilerini kullanarak kurumsal fatura düzenleyecektir. Faturada yer alması
                                    gereken bilgilerin doğru, güncel ve eksiksiz girilmesi tamamen Alıcı’nın sorumluluğunda
                                    olup, bu sebeple doğabilecek tüm zararlardan bizzat Alıcı sorumludur.</p>
                                <p><b>6.3.</b> Platform üzerinden kredi kart ile ödeme yapılması halinde, Banka tarafından
                                    kampanyalar düzenlenerek Alıcı tarafından seçilen taksit adedinin daha üstünde bir
                                    taksit adedi uygulanabilecek veya taksit erteleme gibi ek hizmetler sunulabilecektir. Bu
                                    tür kampanyalar Banka’nın inisiyatifindedir. Alıcı’nın kredi kartının hesap kesim
                                    tarihinden itibaren sipariş toplamı taksit adedine bölünerek kredi kartı özetine Banka
                                    tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat farklarını dikkate alarak
                                    aylara eşit olarak dağıtmayabilir. Detaylı ödeme planlarının oluşturulması Banka’nın
                                    inisiyatifindedir.</p>
                                <p><b>6.4.</b> Dijital ürünler fiziki gönderime uygun olmayıp, teslimat ürün niteliğine göre
                                    şartlarında belirtilen şekilde gerçekleştirilecektir. Sözleşme’nin yer alıp da teslimat
                                    şekilleri vb. gibi fiziki ürünler için geçerli olan düzenlemeler dijital ürünlere
                                    uygulanmayacak olup bu maddelerdeki düzenlemeler uygulanabilir olduğu ölçüde ürün
                                    şartlarında belirtilen koşul ve açıklamalara uygun olacak şeklinde yorumlanmalıdır.</p>
                                <p><b>6.5.</b>Sipariş verilen Ürün’ün elektrikli motosiklet olması halinde kurulumu
                                    gerçekleştikten veya tescil işlemi yapılıp ruhsatlandıktan sonra Platform üzerinden
                                    iadesi mümkün olmamaktadır.</p>
                                <p><b>6.6.</b> Platformda satışa sunulan Ürün/Hizmetler yalnızca Satıcı tarafından
                                    belirlenen sınırlı lokasyonlara (il/ilçe/bölge) teslim edilmek üzere satışa
                                    sunulabilecek olup, sipariş sürecinde Alıcı'nın bu ürün/hizmetler için teslimat adresini
                                    Satıcı tarafından belirlenmiş olan lokasyonlardan biri dışında seçmesi halinde ilgili
                                    sipariş verilemeyecek/satın alım gerçekleşmeyecektir.</p>
                                <p><b>6.7.</b>Türkiye Cumhuriyeti resmi kamu kurum ve kuruluşları ile koordineli yürütülen
                                    "Depreme Yardım Seferberliği" ve benzeri seferberlik ve yardım işlemleriyle bağlantılı
                                    siparişlerde (ö: koli yardımı, vb.), Mesafeli Sözleşmeler Yönetmeliği’nin 15/1-h maddesi
                                    gereği cayma hakkı kullanılamayacaktır.</p>
                                <h3 class="pre-contract-h3">7.
                                    <span>KİŞİSEL VERİLERİN KORUNMASI VE FİKRİ-SINAİ HAKLAR</span></h3>
                                <p><b>7.1.</b> Satıcı, işbu sözleşme kapsamındaki kişisel verileri sadece Ürün/Hizmet’in
                                    sunulması amacıyla sınırlı olarak ve 6698 sayılı Kişisel Verilerin Korunması Kanunu’na,
                                    (“KVKK”) ikincil mevzuata ve Kişisel Verileri Koruma Kurulu kararlarına uygun olarak
                                    işleyecektir. Satıcı, Platform üzerinden eriştiği kişisel veriler haricinde Alıcı’nın
                                    kişisel verilerini işlemeyeceğini ve Platform üzerinden sağlanan yöntemler dışında Alıcı
                                    ile harici olarak iletişime geçmeyeceğini kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.2.</b> Alıcı, işbu Sözleşme kapsamında sağladığı kişisel verilerin doğru, eksiksiz
                                    ve güncel olduğunu kontrol etmekle, bu bilgileri üçüncü kişilerle paylaşmamak, ilgisiz
                                    kişilerce erişilememesi için virüs ve benzeri zararlı uygulamalara ilişkin olanlar dahil
                                    gerekli tedbirleri almak ve söz konusu kişisel verilerin güvenliğini sağlamakla yükümlü
                                    olduğunu, aksi halde doğacak zararlardan ve üçüncü kişilerden gelen taleplerden bizzat
                                    sorumlu olduğunu kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.3.</b> Platform’a ait her türlü bilgi ve içerik ile bunların düzenlenmesi, revizyonu
                                    ve kısmen/tamamen kullanımı konusunda; Satıcı'nın anlaşmasına göre diğer üçüncü
                                    şahıslara ait olanlar hariç; tüm fikri-sınai haklar ve mülkiyet hakları DSM’ye aittir.
                                </p>
                                <h3 class="pre-contract-h3">8. <span>CAYMA HAKKI</span></h3>
                                <p><b>8.1.</b> Alıcı, 15 (onbeş) gün içinde herhangi bir gerekçe göstermeksizin ve cezai
                                    şart ödemeksizin Sözleşme’den cayma hakkına sahiptir.</p>
                                <p><b>8.2.</b> Cayma hakkı süresi, Hizmet için Sözleşme’nin kurulduğu gün; Ürün için
                                    Alıcı’nın veya Alıcı tarafından belirlenen üçüncü kişinin Ürün’ü teslim aldığı gün
                                    başlar. Ancak Alıcı, Sözleşme’nin kurulmasından Ürün teslimine kadar olan süre içinde de
                                    cayma hakkını kullanabilir.</p>
                                <p><b>8.3.</b> Cayma hakkı süresinin belirlenmesinde;</p>
                                <p><b>a)</b> Tek sipariş konusu olup ayrı ayrı teslim edilen Ürün’de, Alıcı veya Alıcı
                                    tarafından belirlenen üçüncü kişinin son Ürün’ü teslim aldığı gün,</p>
                                <p><b>b)</b> Birden fazla parçadan oluşan Ürün’de, Alıcı veya Alıcı tarafından belirlenen
                                    üçüncü kişinin son parçayı teslim aldığı gün,</p>
                                <p><b>c)</b> Belirli bir süre boyunca Ürün’ün düzenli tesliminin yapıldığı durumlarda, Alıcı
                                    veya Alıcı tarafından belirlenen üçüncü kişinin ilk Ürün’ü teslim aldığı gün</p>
                                <p>esas alınır.</p>
                                <p><b>8.4.</b> Ürün teslimi ile Hizmet ifasının birlikte olduğu durumlarda, Ürün teslimine
                                    ilişkin cayma hakkı hükümleri uygulanır.</p>
                                <p><b>8.5.</b> Satıcı;</p>
                                <p><b>a)</b> Ürün'ün teslimi veya Hizmet’in ifasından önce Alıcı’nın cayma hakkını
                                    kullanması durumunda cayma hakkının kullanıldığına ilişkin bildirimin kendisine ulaştığı
                                    tarihten itibaren,</p>
                                <p><b>b)</b> Ürün’ün tesliminden sonra Alıcı’nın cayma hakkını kullanması durumunda, cayma
                                    bildiriminin kendisine ulaştığı tarih itibarıyla bedel Satıcı’ya aktarılmamışsa cayma
                                    hakkına konu Ürün’ün, iade için öngörülen Kargo Şirketi’ne teslim edildiği tarihten veya
                                    iade için öngörülenin haricinde bir Kargo Şirketi ile iade edilmesi durumunda da
                                    Satıcı’ya ulaştığı tarihten itibaren,</p>
                                <p><b>c)</b> Alıcı’nın siparişinin yasal süre içerisinde teslim edilememesi nedeniyle
                                    Sözleşme’yi fesih hakkını kullanması durumunda fesih bildiriminin kendisine ulaştığı
                                    tarihten itibaren</p>
                                <p>15 (onbeş) gün içinde, tahsil ettiği Sözleşme konusu bedeli ile teslimat masraflarının
                                    Alıcı’ya iadesinden sorumludur.</p>
                                <p><b>8.6.</b> Cayma hakkı bildiriminin ve Sözleşme’ye ilişkin diğer bildirimlerin mevzuata
                                    uygun ve süresi içerisinde Platform’da belirtilen DSM’ye ve/veya Satıcı’ya ait iletişim
                                    kanallarından yapılması şarttır. Cayma bildiriminin yapılacağı iletişim kanallarına
                                    https://www.trendyol.com/iletisim.html linkinden ulaşılabilmektedir.</p>
                                <p><b>8.7.</b> Cayma hakkının kullanılması halinde:</p>
                                <p><b>a)</b> Alıcı cayma hakkını kullanmasından itibaren 14 (ondört) gün içerisinde Ürün’ü
                                    Satıcı'ya Kargo Şirketi’yle geri gönderir.</p>
                                <p><b>b)</b> Cayma hakkı kapsamında iade edilecek Ürün kutusu, ambalajı, varsa standart
                                    aksesuarları ve varsa Ürün ile birlikte hediye edilen diğer Ürünler’in de eksiksiz ve
                                    hasarsız olarak iade edilmesi gerekmektedir.</p>
                                <p><b>8.8.</b> Alıcı cayma süresi içinde Ürün’ü, işleyişine, teknik özelliklerine ve
                                    kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana gelen değişiklik ve
                                    bozulmalardan sorumlu değildir.</p>
                                <p><b>8.9.</b> Cayma hakkının kullanılmasını takip eden 14 (ondört) gün içerisinde Sözleşme
                                    konusu bedeller Alıcı’ya Alıcı’nın ödeme yöntemi ile iade edilmektedir. Ürün/Hizmet,
                                    Satıcı'ya iade edilirken, Ürün/Hizmet’in teslimi sırasında Alıcı’ya ibraz edilmiş olan
                                    orijinal faturanın da Alıcı tarafından iade edilmesi gerekmektedir. Alıcı’nın kurumsal
                                    fatura istemesi halinde ilgili Ürün/Hizmet iadesi için iade faturası kesmesi veya
                                    mümkünse süresi içerisinde ticari faturayı kendi sistemlerinden reddetmesi
                                    gerekmektedir.</p>
                                <p><b>8.10.</b> Alıcı iade edeceği Ürün/Hizmet’i Ön Bilgilendirme Formu’nda belirtilen
                                    Satıcı'nın Kargo Şirketi ile Satıcı'ya gönderdiği sürece iade kargo bedeli Satıcı'ya
                                    aittir. İade için Alıcı’nın bulunduğu yerde Satıcı’nın Kargo Şirketi şubesi bulunmaması
                                    halinde, Alıcı Ürün’ü herhangi bir Kargo Şirketi’yle gönderebilecektir. Bu halde iade
                                    kargo bedeli ve Ürün’ün kargo sürecinde uğrayacağı hasardan Satıcı sorumludur.</p>
                                <p><b>8.11.</b> Alıcı cayma hakkını işbu maddede belirtilen süre ve usuller dahilinde
                                    kullanacak olup aksi halde cayma hakkını kaybedecektir.</p>
                                <h3 class="pre-contract-h3">9. <span>CAYMA HAKKININ KULLANILAMAYACAĞI HALLER</span></h3>
                                <p><b>9.1.</b> Alıcı aşağıdaki sözleşmelerde cayma hakkını kullanamaz:</p>
                                <p><b>a) </b>Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı
                                    veya DSM’nin kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler,</p>
                                <p><b>b) </b>Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                    ilişkin sözleşmeler,</p>
                                <p><b>c) </b>Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine
                                    ilişkin sözleşmeler,</p>
                                <p><b>d)</b> Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                    olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin
                                    sözleşmeler,</p>
                                <p><b>e) </b>Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması
                                    mümkün olmayan mallara ilişkin sözleşmeler,</p>
                                <p><b>f)</b>Ürünün tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları
                                    açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf
                                    malzemelerine ilişkin sözleşmeler,</p>
                                <p><b>g)</b>Abonelik sözleşmesi kapsamında sağlananlar dışında gazete ve dergi gibi süreli
                                    yayınların teslimine ilişkin sözleşmeler,</p>
                                <p><b>h)</b>Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma,
                                    araba kiralama, yiyecek içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş
                                    zamanın değerlendirilmesine ilişkin sözleşmeler,</p>
                                <p><b>i)</b> Elektronik ortamda anında ifa edilen hizmetler ile Alıcı’ya anında teslim
                                    edilen gayri maddi mallara ilişkin sözleşmeler,</p>
                                <p><b>j)</b> Cayma hakkı süresi sona ermeden önce, Alıcı’nın onayı ile ifasına başlanan
                                    hizmetlere ilişkin sözleşmeler,</p>
                                <p>cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.2.</b> Ürün/Hizmet’in Yönetmelik'in uygulama alanı dışında bırakılmış olan <i>(Sözleşme’nin
                                        3.3. maddesinde listelenmiştir)</i> Ürün/Hizmet türlerinden müteşekkil olması halinde
                                    Alıcı ve Satıcı arasındaki hukuki ilişkiye Yönetmelik hükümleri uygulanamaması sebebiyle
                                    cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.3.</b> Platform üzerinden elektronik kod satın alındığı durumlarda bahse konu
                                    siparişlerde Yönetmelik gereği cayma hakkı söz konusu olmayacaktır. Bu siparişler
                                    bakımından Platform üzerinden iade kodu da oluşturulamayacaktır.</p>
                                <h3 class="pre-contract-h3">10. <span>UYUŞMAZLIKLARIN ÇÖZÜMÜ</span></h3>
                                <p><b>10.1</b>Sözleşme’nin uygulanmasında, Bakanlık’ça ilan edilen değerlere uygun olarak
                                    Alıcı’nın Ürün/Hizmet’i satın aldığı ve ikametgahının bulunduğu yerdeki Tüketici Hakem
                                    Heyetleri ile Tüketici Mahkemeleri yetkilidir.</p>
                                <h3 class="pre-contract-h3 pre-contract-title">ÖN BİLGİLENDİRME FORMU</h3>
                                <h3 class="pre-contract-h3">1. <span>TARAFLAR VE KONU</span></h3>
                                <p>İşbu Ön Bilgilendirme Formu’nun konusu, Alıcı ve Satıcı arasındaki Sözleşme’ye ilişkin
                                    Kanun ve Yönetmelik hükümleri uyarınca bilgilendirilmesidir. Ayrıca Yönetmelik uyarınca
                                    yer verilmesi zorunlu olan hususlar Ön Bilgilendirme Formu’nda yer almaktadır.</p>
                                <p>ALICI, Ön Bilgilendirme Formu ve Sözleşme’ye ilişkin bilgileri üyeliğinin bağlı olduğu
                                    “Hesabım” sayfasından takip edebilecek olup değişen bilgilerini bu sayfa üstünden
                                    güncelleyebilecektir. Ön Bilgilendirme Formu ve Sözleşme’nin bir nüshası Alıcı’nın
                                    üyelik hesabında mevcuttur ve talep edilmesi halinde ayrıca elektronik posta ile de
                                    gönderilebilecektir.</p>
                                <h3 class="pre-contract-h3">2. <span>TANIMLAR</span></h3>
                                <p>Ön Bilgilendirme Formu ve Sözleşme’nin uygulanmasında ve yorumlanmasında aşağıda yazılı
                                    terimler karşılarındaki yazılı açıklamaları ifade edeceklerdir.</p>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>ALICI</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">Bir Mal veya Hizmet’i ticari veya mesleki
                                            olmayan amaçlarla edinen, kullanan veya yararlanan gerçek kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Bakanlık</strong></td>
                                        <td>:</td>
                                        <td>Türkiye Cumhuriyeti Ticaret Bakanlığı’nı,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Banka</strong></td>
                                        <td>:</td>
                                        <td>5411 sayılı Bankacılık Kanunu uyarınca kurulan lisanslı kuruluşları,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>DSM veya Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı</strong></td>
                                        <td>:</td>
                                        <td>Oluşturduğu sistem ile Satıcı’nın Ürün/Hizmet’i satışa sunduğu Platform’u
                                            işleten ve Satıcı adına mesafeli sözleşme kurulmasına aracılık eden DSM Grup
                                            Danışmanlık İletişim ve Satış Ticaret Anonim Şirketi’ni,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Hizmet</strong></td>
                                        <td>:</td>
                                        <td>Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen Ürün
                                            sağlama dışındaki her türlü tüketici işleminin konusunu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kanun</strong></td>
                                        <td>:</td>
                                        <td>6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi</strong></td>
                                        <td>:</td>
                                        <td>Ürün’ün Alıcı’ya ulaştırılmasını, iade süreçlerinde Alıcı’dan alınarak Satıcı
                                            veya DSM’ye ulaştırılmasını sağlayan anlaşmalı kargo veya lojistik şirketini,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ön Bilgilendirme Formu</strong></td>
                                        <td>:</td>
                                        <td>Sözleşme kurulmadan ya da buna karşılık herhangi bir teklif Alıcı tarafından
                                            kabul edilmeden önce Alıcı’yı Yönetmelik’te belirtilen asgari hususlar konusunda
                                            bilgilendirmek için hazırlanan formu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Platform</strong></td>
                                        <td>:</td>
                                        <td>DSM’ye ait www.trendyol.com adlı internet sitesini ve mobil uygulamasını,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı</strong></td>
                                        <td>:</td>
                                        <td>Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla
                                            tüketiciye Ürün/Hizmet sunan ya da Ürün/Hizmet sunanın adına ya da hesabına
                                            hareket eden ve aşağıda bilgileri bulunan gerçek ve/veya tüzel kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sözleşme</strong></td>
                                        <td>:</td>
                                        <td>Satıcı ve Alıcı arasında akdedilen Sözleşme’yi,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Trendyol Teslimat Noktası</strong></td>
                                        <td>:</td>
                                        <td>Alıcı’nın satın aldığı Ürünler’i kolayca teslim alabildiği anlaşmalı esnaf
                                            noktalarını, kargo şubelerini ve zincir mağazalarını,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ürün</strong></td>
                                        <td>:</td>
                                        <td>Alışverişe konu olan taşınır eşya, konut veya tatil amaçlı taşınmaz mallar ile
                                            elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri
                                            her türlü gayri maddi malı,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Yönetmelik</strong></td>
                                        <td>:</td>
                                        <td>Mesafeli Sözleşmeler Yönetmeliği’ni ifade eder.</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">3. <span>ALICI, SATICI VE ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI</span>
                                </h3>
                                <h3 class="distant-contract-h3">ALICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong>
                                        </td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Telefon</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Faks</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>E-posta/Kullanıcı Adı</strong></td>
                                        <td>:</td>
                                        <td>srcn.ozn5@gmail.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">SATICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Satıcının Ticaret Unvanı / Adı ve
                                                Soyadı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">TNS BİLİŞİM ELEKTRONİK SANAYİ VE DIŞ
                                            TİCARET LİMİTED ŞİRKETİ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Adresi</strong></td>
                                        <td>:</td>
                                        <td>Türkmen Mahallesi Ödemiş Ayakkabıcılar Sitesi No:49 Blok:A/10</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0845032587200015</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>8450325872</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Telefonu</strong></td>
                                        <td>:</td>
                                        <td>5061685248</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>5061685248</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı KEP ve E-posta Bilgileri</strong></td>
                                        <td>:</td>
                                        <td>tnsbilisimelktroniksanayi@hs01.kep.tr</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı Unvanı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">DSM Grup Danışmanlık İletişim ve Satış
                                            Ticaret A.Ş.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Adresi</strong></td>
                                        <td>:</td>
                                        <td>Maslak Mahallesi Saat Sokak Spine Tower No:5 iç kapı:19 Sarıyer İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0313055766900016</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>Maslak VD- 3130557669</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Telefonu</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>0 212 332 18 93</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Şikâyet/Öneri Kanalları</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200 telefon numarası üzerinden ve Platform’da yer alan “Trendyol
                                            Asistan’a Sor” başlıklı alandan şikayet ve öneriler iletilebilecektir.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">4. <span>ÜRÜN/HİZMET BİLGİLERİ</span></h3>
                                <p><b>4.1.</b> Ürün/Hizmet’in temel özellikleri (türü, miktarı, marka/modeli, rengi, adedi,
                                    fiyatı) Platform’da yer almakta olup Platform üzerinden detaylı şekilde
                                    incelenebilecektir.</p>
                                <p><b>4.2.</b> Ürün/Hizmet karşılığında ödenecek tüm tutarlar (tüm vergiler dahil satış
                                    fiyatı, kargo bedeli, taksit farkı tutarı, açık pazar ve/veya diğer butiklerinden eş
                                    zamanlı olarak gerçekleştirilen alışverişlerde hak kazanılan toplam indirim tutarı vb.)
                                    aşağıdaki tabloda gösterilmiştir.</p>
                                <div style="margin-bottom:15px">
                                    <table class="pre-contract-main-table pre-contract-tables" style="width:100%">
                                        <tbody>
                                        <tr>
                                            <th>Ürün/Hizmet Açıklaması</th>
                                            <th>Adet</th>
                                            <th>Peşin Fiyatı</th>
                                            <th>Ara Toplam (KDV Dahil)</th>
                                        </tr>
                                        <tr>
                                            <td>Pesto Smart Çok Amaçlı Wi-Fi Airfryer &amp; Fırın 12 lt</td>
                                            <td>1</td>
                                            <td>11499 TL</td>
                                            <td>11499 TL</td>
                                        </tr>
                                        <tr>
                                            <td>Kargo Tutarı</td>
                                            <td>-</td>
                                            <td>34.07 TL</td>
                                            <td>34.07 TL</td>
                                        </tr>
                                        <tr>
                                            <td>200 TL ve Üzeri Kargo Bedava (Satıcı Karşılar)</td>
                                            <td>-</td>
                                            <td>34.07 TL</td>
                                            <td>34.07 TL</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Toplam</td>
                                            <td>11499 TL</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Kargo Hariç Toplam Ürün
                                                Bedeli</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">11499 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Ücreti</strong></td>
                                        <td>:</td>
                                        <td>34.07 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Taksit Farkı</strong></td>
                                        <td>:</td>
                                        <td>0 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Toplam Sipariş Bedeli</strong></td>
                                        <td>:</td>
                                        <td>11499 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ödeme Şekli ve Planı</strong></td>
                                        <td>:</td>
                                        <td>Tek Çekim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong></td>
                                        <td>:</td>
                                        <td>Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Fatura Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sipariş Tarihi</strong></td>
                                        <td>:</td>
                                        <td>21.2.2024</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Şekli</strong></td>
                                        <td>:</td>
                                        <td>Alıcıya Teslim veya Trendyol Teslimat Noktasına noktasına teslim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Süresi*</strong></td>
                                        <td>:</td>
                                        <td>En geç 30 gün</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi’ne Teslim Süresi**</strong>
                                        </td>
                                        <td>:</td>
                                        <td>2024-02-21</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>Teslim Şartları ürün sayfasında belirtildiği şekilde uygulanacaktır.</b></p>
                                <p>*Sözleşme ve ilgili mevzuat hükümlerinde yer alan istisnalar saklıdır.<br>**Belirtilen
                                    süre teslimatın taahhüdü değildir, satıcı tarafından kargo şirketine teslim edilme
                                    süresini ifade eder.</p>
                                <p><b>4.3. </b>SÖZ KONUSU ÜRÜN BEDELİ, “TRENDYOL ALICI GÜVENCESİ” KAPSAMINDA SATICI ADINA,
                                    DSM TARAFINDAN ALICI’DAN TAHSİL EDİLMEKTEDİR. ALICI MALIN BEDELİNİ DSM'YE ÖDEMEKLE, ÜRÜN
                                    BEDELİNİ SATICI’YA ÖDEMİŞ SAYILACAK VE BİR DAHA ÖDEME YÜKÜMLÜLÜĞÜ ALTINA GİRMEYECEKTİR.
                                    ALICI’NIN İLGİLİ MEVZUAT KAPSAMINDA İADE HAKLARI SAKLIDIR.</p>
                                <p><b>4.4. </b>KDV dahil satış fiyatı 45 TL olup, sepette yalnızca bir tane alınabilen
                                    Trendyol Pass, siparişten itibaren bir (1) ay boyunca geçerli olan 10 kargo hakkı
                                    sağlayan bir pakettir ve DSM tarafından sağlanmaktadır. Siparişten itibaren bir ayın
                                    sonunda kullanmamış olduğunuz, kalan haklarınızın geçerliliği sona erecek ve bir sonraki
                                    aya aktarılamayacaktır. Sepetinizde Trendyol Pass bulunması veya daha önce satın almış
                                    olduğunuz Trendyol Pass haklarınızın hala geçerli olması durumunda, kargo ücreti
                                    Trendyol Pass haklarınızdan mahsup edilecek olup, söz konusu siparişi ürünün kargoya
                                    verilmesini takiben sepetinizdeki ürünlerden herhangi birini iade etmeniz halinde
                                    Mesafeli Sözleşmeler Yönetmeliği’nin 15/1(h) maddesi çerçevesinde Trendyol Pass’e
                                    ilişkin cayma hakkınızı kullanamayacağınız için söz konusu siparişte kullanmış olduğunuz
                                    Trendyol Pass hakkınız veya Trendyol Pass ücreti tarafınıza iade edilemeyecektir.</p>
                                <h3 class="pre-contract-h3">5. <span>GENEL HÜKÜMLER</span></h3>
                                <p><b>5.1.</b> Satıcı, Ürün/Hizmet’i eksiksiz, siparişte belirtilen niteliklere uygun ve
                                    varsa garanti belgeleri, kullanım kılavuzları ile mevzuat gereği Ürün/Hizmet’le birlikte
                                    teslim etmesi gereken sair bilgi ve belgeler ile teslim etmeyi kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.2.</b> Ürün, Alıcı veya Alıcı tarafından belirlenen üçüncü kişiye, taahhüt edilen
                                    teslim süresi içerisinde ve her halükârda 30 (otuz) günlük yasal süreyi aşmamak koşulu
                                    ile, Alıcı’nın Platform’da belirtmiş olduğu teslimat adresine Kargo Şirketi tarafından
                                    teslim edilir. Bu süre içerisinde Satıcı’nın edimini yerine getirmemesi durumunda Alıcı
                                    Sözleşme'yi feshedebilecektir. Ancak Alıcı’nın isteği veya kişisel ihtiyaçları
                                    doğrultusunda hazırlanan Ürün/Hizmet satışlarında teslim süresi ilgili 30 (otuz) günü
                                    aşabilecektir. Ayrıca, sipariş durumu “Ön Sipariş” veya “Sipariş Üzerine Üretim” olarak
                                    belirtilen Ürün/Hizmet için teslimat süresi de 30 (otuz) günü aşabilecek olup Alıcı,
                                    Alıcı’nın isteği veya kişisel ihtiyaçları doğrultusunda hazırlanan “Sipariş Üzerine
                                    Üretim” ya da “Ön Sipariş” statüsünde olan bir Ürün/Hizmet satın aldığında teslimatın 30
                                    (otuz) gün içerisinde yapılmaması dolayısıyla Sözleşme’yi feshedemeyecektir.</p>
                                <p><b>5.3.</b> Satıcı Ürün’ü Kargo Şirketi aracılığı ile Alıcı’ya göndermekte ve teslim
                                    ettirmektedir. Kargo Şirketi’nin Alıcı’nın bulunduğu yerde şubesi olmaması halinde
                                    Alıcı’nın Ürün’ü Kargo Şirketi’nin Satıcı tarafından bildirilen yakın bir diğer
                                    şubesinden teslim alması gerekmektedir.</p>
                                <p><b>5.4.</b> Alıcı’nın sipariş esnasında Ürün’ü Trendyol Teslimat Noktası’na teslim
                                    edilmesini seçmesi halinde, Ürün, Kargo Şirketi tarafından Alıcı’nın seçmiş olduğu
                                    teslimat noktasına taahhüt edilen süre içerisinde ve her halükârda en geç 30 (otuz)
                                    günlük yasal süre içerisinde teslim edilecektir. Ürün’ün Trendyol Teslimat Noktası’na
                                    bırakılmasının ardından Alıcı, seçmiş olduğu teslimat adresi bilgilerinde kayıtlı olan
                                    telefon numarasına gelen kod ile en geç 3 (üç) gün içerisinde Ürün’ü teslim alacaktır.
                                </p>
                                <p><b>5.5.</b> Alıcı’nın herhangi bir nedenle Ürün/Hizmet’i teslim almaması halinde,
                                    Alıcı’nın Ürün/Hizmet’i iade ettiği kabul edilecek olup bu halde, varsa teslimat
                                    masrafları da dâhil olmak üzere Alıcı’dan tahsil edilen tüm ödemeler yasal süresi
                                    içerisinde Alıcı’ya iade edilecektir.</p>
                                <p><b>5.6.</b> Alıcı veya Alıcı tarafından belirlenen üçüncü kişinin teslim anında adreste
                                    bulunmaması durumunda Alıcı'nın Ürün/Hizmet’i geç teslim almasından ve/veya hiç teslim
                                    almamasından kaynaklanan zararlardan ve giderlerden Satıcı sorumlu değildir.</p>
                                <p><b>5.7.</b> Ürün/Hizmet’in teslimat masrafları aksine bir hüküm yoksa Alıcı’ya aittir.
                                    Satıcı, Platform’da teslimat ücretinin kendisince karşılanacağını beyan etmişse teslimat
                                    masrafları Satıcı'ya ait olacaktır.</p>
                                <p><b>5.8.</b> Satıcı, Sözleşme'den doğan ifa yükümlülüğünün süresi dolmadan Alıcı’yı
                                    Platform üzerinden bilgilendirmek ve açıkça onayını almak suretiyle muadil bir
                                    Ürün/Hizmet tedarik edebilecektir.</p>
                                <p><b>5.9.</b> Ürün/Hizmet ediminin yerine getirilmesinin imkansızlaştığı hallerde
                                    Satıcı’nın bu durumu öğrendiği tarihten itibaren 3 (üç) gün içinde Alıcı’ya yazılı
                                    olarak veya veri saklayıcısı ile bildirmesi ve varsa teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeleri bildirim tarihinden itibaren en geç 14 (ondört) gün
                                    içinde iade etmesi zorunludur. Ürün/Hizmet’in stokta bulunmaması durumu, Ürün/Hizmet
                                    ediminin yerine getirilmesinin imkânsızlaşması olarak kabul edilmez.</p>
                                <p><b>5.10.</b> Alıcı, Ürün’ü teslim almadan önce muayene edecek; ezik, kırık, ambalajı
                                    yırtılmış vb. hasarlı, ayıplı veya eksik Ürün/Hizmet’i teslim almayacaktır. Teslim
                                    alınan Ürün/Hizmet’in hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra
                                    Ürün’ün özenle korunması borcu, Alıcı’ya aittir. Cayma hakkı kullanılacaksa Ürün/Hizmet
                                    kullanılmamalı ve Ürün/Hizmet faturası ve teslim sırasında Alıcı’ya iletilen diğer tüm
                                    belgeler (örneğin garanti belgesi, kullanım kılavuzu vb.) ile birlikte iade edilmesi
                                    gerekmektedir.</p>
                                <p><b>5.11.</b> Alıcı, Sözleşme konusu bedeli ödemekle yükümlü olup, herhangi bir nedenle
                                    Sözleşme konusu bedelin ödenmemesinin ve/veya Banka kayıtlarında iptal edilmesinin
                                    Satıcı’nın Ürün/Hizmet’i teslim yükümlülüğü ile Sözleşme’den kaynaklanan sair
                                    yükümlülüklerinin sona ereceğini kabul, beyan ve taahhüt eder. Alıcı, herhangi bir
                                    sebeple Banka tarafından başarısız kodu gönderilen ancak buna rağmen Banka tarafından
                                    Satıcı’ya yapılan ödemelere ilişkin olarak, Satıcı’nın herhangi bir sorumluluğunun
                                    bulunmadığını kabul, beyan ve taahhüt eder.</p>
                                <p><b>5.12.</b> Alıcı, Ürün’ün teslim edilmesinden sonra Alıcı’ya ait kredi kartının
                                    yetkisiz kişilerce haksız kullanılması sonucunda Sözleşme konusu bedelin ilgili Banka
                                    tarafından Satıcı’ya ödenmemesi halinde, Alıcı Ürün’ü 3 (üç) gün içerisinde iade
                                    masrafları Alıcı’ya ait olacak şekilde Satıcı’ya iade edeceğini kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.13.</b> Sözleşme kapsamında herhangi bir nedenle Alıcı’ya bedel iadesi yapılması
                                    gereken durumlarda, Alıcı, ödemeyi kredi kartı ile yapmış olması halinde, Satıcı
                                    tarafından kredi kartına iade edilen tutarın banka tarafından Alıcı hesabına
                                    yansıtılmasına ilişkin ortalama sürecin 2 (iki) ile 3 (üç) haftayı bulabileceğini, bu
                                    tutarın Satıcı tarafından Banka’ya iadesinden sonra Alıcı’nın hesaplarına yansıması
                                    halinin tamamen Banka işlem süreci ile ilgili olduğunu ve olası gecikmelerde Banka’nın
                                    sorumlu olduğunu ve bunlar için DSM’yi ve Satıcı’yı sorumlu tutamayacağını kabul, beyan
                                    ve taahhüt eder.</p>
                                <p><b>5.14.</b> Alıcı ile sipariş esnasında kullanılan kredi kartı hamilinin aynı kişi
                                    olmaması veya Ürün/Hizmet’in Alıcı’ya tesliminden evvel, siparişte kullanılan kredi
                                    kartına ilişkin güvenlik açığı tespit edilmesi halinde, kredi kartı hamiline ilişkin
                                    kimlik ve iletişim bilgilerini, siparişte kullanılan kredi kartının bir önceki aya ait
                                    ekstresini yahut kart hamilinin Banka’dan kredi kartının kendisine ait olduğuna ilişkin
                                    yazıyı ibraz etmesini Alıcı’dan talep edilebilecektir. Alıcı’nın talebe konu
                                    bilgi/belgeleri temin etmesine kadar geçecek sürede sipariş dondurulacak olup, söz
                                    konusu taleplerin 24 (yirmidört) saat içerisinde karşılanmaması halinde ise Satıcı,
                                    siparişi iptal etme hakkını haizdir.</p>
                                <p><b>5.15.</b> Alıcı Sözleşme konusu bedeli Trendyol Cüzdan aracılığıyla ödemesi ve bu
                                    siparişe ilişkin cayma hakkını kullanması halinde cayma hakkından kaynaklı bedel iadesi
                                    Trendyol Cüzdan’a tek seferde yapılabilecektir.</p>
                                <p><b>5.16.</b> Sipariş edilmeyen Ürün/Hizmet’in gönderilmesi durumunda, Alıcı’ya karşı
                                    herhangi bir hak ileri sürülemez. Bu hallerde, Alıcı’nın sessiz kalması ya da söz konusu
                                    Ürün/Hizmet’i kullanmış olması, sözleşmenin kurulmasına yönelik kabul beyanı olarak
                                    yorumlanamaz.</p>
                                <p><b>5.17.</b> Alıcı’nın sipariş edebileceği Ürün/Hizmet adetlerine Platform’dan yapılacak
                                    duyurularla kısıt getirilebilir. Alıcı’nın Platform’dan yapılan duyurularda belirtilen
                                    adedin üzerinde Ürün/Hizmet sipariş etmek istemesi halinde sipariş vermesi
                                    engellenebilecek, siparişi verdikten sonra belirtilen adedin üstünde sipariş verdiğinin
                                    tespit edilmesi halinde ise belirtilen adedin üstündeki siparişleri iptal edilebilecek
                                    ve bu halde varsa iptal edilen siparişlere ilişkin teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeler yasal süresi içerisinde Alıcı’ya iade edilecektir.
                                    Alıcı işbu hususları kabul ederek siparişini oluşturduğunu, adet sınırlamasını geçen
                                    siparişlerinin engellenebileceği ve iptal edilebileceğini kabul, beyan ve taahhüt eder.
                                </p>
                                <p><b>5.18.</b> Satıcı’nın herhangi bir sebeple tedarik edemediği siparişler, Alıcı’nın
                                    onayının alınması halinde, mevzuattaki yasal teslim süresini aşmamak ve Alıcı’nın
                                    Ürün/Hizmet ile aynı özellikleri haiz olmak kaydıyla, bir başka satıcıya
                                    aktarılabilecektir. Böyle bir durumda Ürün/Hizmet yeni satıcı tarafından Alıcı’ya
                                    gönderilecek olup Sözleşme yeni satıcı ile Alıcı arasında kurulmuş olacaktır. Bu halde,
                                    Alıcı’ya herhangi bir ek bedel, ücret ve/veya masraf yansıtılmayacaktır.</p>
                                <p><b>5.19.</b> Alıcı tüketici sıfatıyla talep, şikayet ve önerilerini yukarıda yer alan
                                    Satıcı iletişim bilgilerini kullanmak suretiyle ve/veya Platform’un sağladığı kanallarla
                                    (0 212 331 0 200 telefon numarası üzerinden ve “Trendyol Asistan’a Sor” başlıklı
                                    alandan) ulaştırabilecektir.</p>
                                <h3 class="pre-contract-h3">6. <span>ÖZEL ŞARTLAR</span></h3>
                                <p><b>6.1.</b> Alıcı, aksi belirtilmedikçe, Platform’da birden fazla butikten tek bir
                                    sepette alışveriş yapabilecektir. Aynı sepet içerisinde farklı butikten alınan her bir
                                    Ürün/Hizmet için Satıcı tarafından birden fazla fatura kesilebilecektir. Şüpheye mahal
                                    bırakmamak bakımından belirtilmelidir ki, Satıcı, Alıcı’nın farklı butiklerden aldığı
                                    Ürün/Hizmet’in teslimatını mevzuattaki yasal süre içerisinde kalmak koşuluyla farklı
                                    zamanlarda gerçekleştirebilecektir.</p>
                                <p><b>6.2.</b> Alıcı’nın vereceği siparişlerde kurumsal fatura seçeneğini seçmesi durumunda
                                    Satıcı, Alıcı tarafından Platform üzerinden bildirilecek vergi kimlik numarası ve vergi
                                    dairesi bilgilerini kullanarak kurumsal fatura düzenleyecektir. Faturada yer alması
                                    gereken bilgilerin doğru, güncel ve eksiksiz girilmesi tamamen Alıcı’nın sorumluluğunda
                                    olup, bu sebeple doğabilecek tüm zararlardan bizzat Alıcı sorumludur.</p>
                                <p><b>6.3.</b> Platform üzerinden kredi kart ile ödeme yapılması halinde, Banka tarafından
                                    kampanyalar düzenlenerek Alıcı tarafından seçilen taksit adedinin daha üstünde bir
                                    taksit adedi uygulanabilecek veya taksit erteleme gibi ek hizmetler sunulabilecektir. Bu
                                    tür kampanyalar Banka’nın inisiyatifindedir. Alıcı’nın kredi kartının hesap kesim
                                    tarihinden itibaren sipariş toplamı taksit adedine bölünerek kredi kartı özetine Banka
                                    tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat farklarını dikkate alarak
                                    aylara eşit olarak dağıtmayabilir. Detaylı ödeme planlarının oluşturulması Banka’nın
                                    inisiyatifindedir.</p>
                                <p><b>6.4.</b> Dijital ürünler fiziki gönderime uygun olmayıp, teslimat ürün niteliğine göre
                                    şartlarında belirtilen şekilde gerçekleştirilecektir. Sözleşme’nin yer alıp da teslimat
                                    şekilleri vb. gibi fiziki ürünler için geçerli olan düzenlemeler dijital ürünlere
                                    uygulanmayacak olup bu maddelerdeki düzenlemeler uygulanabilir olduğu ölçüde ürün
                                    şartlarında belirtilen koşul ve açıklamalara uygun olacak şeklinde yorumlanmalıdır.</p>
                                <p><b>6.5.</b>Sipariş verilen Ürün’ün elektrikli motosiklet olması halinde kurulumu
                                    gerçekleştikten veya tescil işlemi yapılıp ruhsatlandıktan sonra Platform üzerinden
                                    iadesi mümkün olmamaktadır.</p>
                                <p><b>6.6.</b> Platformda satışa sunulan Ürün/Hizmetler yalnızca Satıcı tarafından
                                    belirlenen sınırlı lokasyonlara (il/ilçe/bölge) teslim edilmek üzere satışa
                                    sunulabilecek olup, sipariş sürecinde Alıcı'nın bu ürün/hizmetler için teslimat adresini
                                    Satıcı tarafından belirlenmiş olan lokasyonlardan biri dışında seçmesi halinde ilgili
                                    sipariş verilemeyecek/satın alım gerçekleşmeyecektir.</p>
                                <p><b>6.7.</b>Türkiye Cumhuriyeti resmi kamu kurum ve kuruluşları ile koordineli yürütülen
                                    "Depreme Yardım Seferberliği" ve benzeri seferberlik ve yardım işlemleriyle bağlantılı
                                    siparişlerde (ö: koli yardımı, vb.), Mesafeli Sözleşmeler Yönetmeliği’nin 15/1-h maddesi
                                    gereği cayma hakkı kullanılamayacaktır.</p>
                                <h3 class="pre-contract-h3">7.
                                    <span>KİŞİSEL VERİLERİN KORUNMASI VE FİKRİ-SINAİ HAKLAR</span></h3>
                                <p><b>7.1.</b> Satıcı, işbu sözleşme kapsamındaki kişisel verileri sadece Ürün/Hizmet’in
                                    sunulması amacıyla sınırlı olarak ve 6698 sayılı Kişisel Verilerin Korunması Kanunu’na,
                                    (“KVKK”) ikincil mevzuata ve Kişisel Verileri Koruma Kurulu kararlarına uygun olarak
                                    işleyecektir. Satıcı, Platform üzerinden eriştiği kişisel veriler haricinde Alıcı’nın
                                    kişisel verilerini işlemeyeceğini ve Platform üzerinden sağlanan yöntemler dışında Alıcı
                                    ile harici olarak iletişime geçmeyeceğini kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.2.</b> Alıcı, işbu Sözleşme kapsamında sağladığı kişisel verilerin doğru, eksiksiz
                                    ve güncel olduğunu kontrol etmekle, bu bilgileri üçüncü kişilerle paylaşmamak, ilgisiz
                                    kişilerce erişilememesi için virüs ve benzeri zararlı uygulamalara ilişkin olanlar dahil
                                    gerekli tedbirleri almak ve söz konusu kişisel verilerin güvenliğini sağlamakla yükümlü
                                    olduğunu, aksi halde doğacak zararlardan ve üçüncü kişilerden gelen taleplerden bizzat
                                    sorumlu olduğunu kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.3.</b> Platform’a ait her türlü bilgi ve içerik ile bunların düzenlenmesi, revizyonu
                                    ve kısmen/tamamen kullanımı konusunda; Satıcı'nın anlaşmasına göre diğer üçüncü
                                    şahıslara ait olanlar hariç; tüm fikri-sınai haklar ve mülkiyet hakları DSM’ye aittir.
                                </p>
                                <h3 class="pre-contract-h3">8. <span>CAYMA HAKKI</span></h3>
                                <p><b>8.1.</b> Alıcı, 15 (onbeş) gün içinde herhangi bir gerekçe göstermeksizin ve cezai
                                    şart ödemeksizin Sözleşme’den cayma hakkına sahiptir.</p>
                                <p><b>8.2.</b> Cayma hakkı süresi, Hizmet için Sözleşme’nin kurulduğu gün; Ürün için
                                    Alıcı’nın veya Alıcı tarafından belirlenen üçüncü kişinin Ürün’ü teslim aldığı gün
                                    başlar. Ancak Alıcı, Sözleşme’nin kurulmasından Ürün teslimine kadar olan süre içinde de
                                    cayma hakkını kullanabilir.</p>
                                <p><b>8.3.</b> Cayma hakkı süresinin belirlenmesinde;</p>
                                <p><b>a)</b> Tek sipariş konusu olup ayrı ayrı teslim edilen Ürün’de, Alıcı veya Alıcı
                                    tarafından belirlenen üçüncü kişinin son Ürün’ü teslim aldığı gün,</p>
                                <p><b>b)</b> Birden fazla parçadan oluşan Ürün’de, Alıcı veya Alıcı tarafından belirlenen
                                    üçüncü kişinin son parçayı teslim aldığı gün,</p>
                                <p><b>c)</b> Belirli bir süre boyunca Ürün’ün düzenli tesliminin yapıldığı durumlarda, Alıcı
                                    veya Alıcı tarafından belirlenen üçüncü kişinin ilk Ürün’ü teslim aldığı gün</p>
                                <p>esas alınır.</p>
                                <p><b>8.4.</b> Ürün teslimi ile Hizmet ifasının birlikte olduğu durumlarda, Ürün teslimine
                                    ilişkin cayma hakkı hükümleri uygulanır.</p>
                                <p><b>8.5.</b> Satıcı;</p>
                                <p><b>a)</b> Ürün'ün teslimi veya Hizmet’in ifasından önce Alıcı’nın cayma hakkını
                                    kullanması durumunda cayma hakkının kullanıldığına ilişkin bildirimin kendisine ulaştığı
                                    tarihten itibaren,</p>
                                <p><b>b)</b> Ürün’ün tesliminden sonra Alıcı’nın cayma hakkını kullanması durumunda, cayma
                                    bildiriminin kendisine ulaştığı tarih itibarıyla bedel Satıcı’ya aktarılmamışsa cayma
                                    hakkına konu Ürün’ün, iade için öngörülen Kargo Şirketi’ne teslim edildiği tarihten veya
                                    iade için öngörülenin haricinde bir Kargo Şirketi ile iade edilmesi durumunda da
                                    Satıcı’ya ulaştığı tarihten itibaren,</p>
                                <p><b>c)</b> Alıcı’nın siparişinin yasal süre içerisinde teslim edilememesi nedeniyle
                                    Sözleşme’yi fesih hakkını kullanması durumunda fesih bildiriminin kendisine ulaştığı
                                    tarihten itibaren</p>
                                <p>15 (onbeş) gün içinde, tahsil ettiği Sözleşme konusu bedeli ile teslimat masraflarının
                                    Alıcı’ya iadesinden sorumludur.</p>
                                <p><b>8.6.</b> Cayma hakkı bildiriminin ve Sözleşme’ye ilişkin diğer bildirimlerin mevzuata
                                    uygun ve süresi içerisinde Platform’da belirtilen DSM’ye ve/veya Satıcı’ya ait iletişim
                                    kanallarından yapılması şarttır. Cayma bildiriminin yapılacağı iletişim kanallarına
                                    https://www.trendyol.com/iletisim.html linkinden ulaşılabilmektedir.</p>
                                <p><b>8.7.</b> Cayma hakkının kullanılması halinde:</p>
                                <p><b>a)</b> Alıcı cayma hakkını kullanmasından itibaren 14 (ondört) gün içerisinde Ürün’ü
                                    Satıcı'ya Kargo Şirketi’yle geri gönderir.</p>
                                <p><b>b)</b> Cayma hakkı kapsamında iade edilecek Ürün kutusu, ambalajı, varsa standart
                                    aksesuarları ve varsa Ürün ile birlikte hediye edilen diğer Ürünler’in de eksiksiz ve
                                    hasarsız olarak iade edilmesi gerekmektedir.</p>
                                <p><b>8.8.</b> Alıcı cayma süresi içinde Ürün’ü, işleyişine, teknik özelliklerine ve
                                    kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana gelen değişiklik ve
                                    bozulmalardan sorumlu değildir.</p>
                                <p><b>8.9.</b> Cayma hakkının kullanılmasını takip eden 14 (ondört) gün içerisinde Sözleşme
                                    konusu bedeller Alıcı’ya Alıcı’nın ödeme yöntemi ile iade edilmektedir. Ürün/Hizmet,
                                    Satıcı'ya iade edilirken, Ürün/Hizmet’in teslimi sırasında Alıcı’ya ibraz edilmiş olan
                                    orijinal faturanın da Alıcı tarafından iade edilmesi gerekmektedir. Alıcı’nın kurumsal
                                    fatura istemesi halinde ilgili Ürün/Hizmet iadesi için iade faturası kesmesi veya
                                    mümkünse süresi içerisinde ticari faturayı kendi sistemlerinden reddetmesi
                                    gerekmektedir.</p>
                                <p><b>8.10.</b> Alıcı iade edeceği Ürün/Hizmet’i Ön Bilgilendirme Formu’nda belirtilen
                                    Satıcı'nın Kargo Şirketi ile Satıcı'ya gönderdiği sürece iade kargo bedeli Satıcı'ya
                                    aittir. İade için Alıcı’nın bulunduğu yerde Satıcı’nın Kargo Şirketi şubesi bulunmaması
                                    halinde, Alıcı Ürün’ü herhangi bir Kargo Şirketi’yle gönderebilecektir. Bu halde iade
                                    kargo bedeli ve Ürün’ün kargo sürecinde uğrayacağı hasardan Satıcı sorumludur.</p>
                                <p><b>8.11.</b> Alıcı cayma hakkını işbu maddede belirtilen süre ve usuller dahilinde
                                    kullanacak olup aksi halde cayma hakkını kaybedecektir.</p>
                                <h3 class="pre-contract-h3">9. <span>CAYMA HAKKININ KULLANILAMAYACAĞI HALLER</span></h3>
                                <p><b>9.1.</b> Alıcı aşağıdaki sözleşmelerde cayma hakkını kullanamaz:</p>
                                <p><b>a) </b>Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı
                                    veya DSM’nin kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler,</p>
                                <p><b>b) </b>Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                    ilişkin sözleşmeler,</p>
                                <p><b>c) </b>Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine
                                    ilişkin sözleşmeler,</p>
                                <p><b>d)</b> Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                    olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin
                                    sözleşmeler,</p>
                                <p><b>e) </b>Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması
                                    mümkün olmayan mallara ilişkin sözleşmeler,</p>
                                <p><b>f)</b>Ürünün tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları
                                    açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf
                                    malzemelerine ilişkin sözleşmeler,</p>
                                <p><b>g)</b>Abonelik sözleşmesi kapsamında sağlananlar dışında gazete ve dergi gibi süreli
                                    yayınların teslimine ilişkin sözleşmeler,</p>
                                <p><b>h)</b>Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma,
                                    araba kiralama, yiyecek içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş
                                    zamanın değerlendirilmesine ilişkin sözleşmeler,</p>
                                <p><b>i)</b> Elektronik ortamda anında ifa edilen hizmetler ile Alıcı’ya anında teslim
                                    edilen gayri maddi mallara ilişkin sözleşmeler,</p>
                                <p><b>j)</b> Cayma hakkı süresi sona ermeden önce, Alıcı’nın onayı ile ifasına başlanan
                                    hizmetlere ilişkin sözleşmeler,</p>
                                <p>cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.2.</b> Ürün/Hizmet’in Yönetmelik'in uygulama alanı dışında bırakılmış olan <i>(Sözleşme’nin
                                        3.3. maddesinde listelenmiştir)</i> Ürün/Hizmet türlerinden müteşekkil olması halinde
                                    Alıcı ve Satıcı arasındaki hukuki ilişkiye Yönetmelik hükümleri uygulanamaması sebebiyle
                                    cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.3.</b> Platform üzerinden elektronik kod satın alındığı durumlarda bahse konu
                                    siparişlerde Yönetmelik gereği cayma hakkı söz konusu olmayacaktır. Bu siparişler
                                    bakımından Platform üzerinden iade kodu da oluşturulamayacaktır.</p>
                                <h3 class="pre-contract-h3">10. <span>UYUŞMAZLIKLARIN ÇÖZÜMÜ</span></h3>
                                <p><b>10.1</b>Sözleşme’nin uygulanmasında, Bakanlık’ça ilan edilen değerlere uygun olarak
                                    Alıcı’nın Ürün/Hizmet’i satın aldığı ve ikametgahının bulunduğu yerdeki Tüketici Hakem
                                    Heyetleri ile Tüketici Mahkemeleri yetkilidir.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-wrapper mt-5">
                        <h5>Mesafeli Satış Sözleşmesi</h5>
                        <div class="contracts-text-wrapper">
                            <div class="contract-text mx-auto">
                                <h3 class="pre-contract-h3 pre-contract-title">ÖN BİLGİLENDİRME FORMU</h3>
                                <h3 class="pre-contract-h3">1. <span>TARAFLAR VE KONU</span></h3>
                                <p>İşbu Ön Bilgilendirme Formu’nun konusu, Alıcı ve Satıcı arasındaki Sözleşme’ye ilişkin
                                    Kanun ve Yönetmelik hükümleri uyarınca bilgilendirilmesidir. Ayrıca Yönetmelik uyarınca
                                    yer verilmesi zorunlu olan hususlar Ön Bilgilendirme Formu’nda yer almaktadır.</p>
                                <p>ALICI, Ön Bilgilendirme Formu ve Sözleşme’ye ilişkin bilgileri üyeliğinin bağlı olduğu
                                    “Hesabım” sayfasından takip edebilecek olup değişen bilgilerini bu sayfa üstünden
                                    güncelleyebilecektir. Ön Bilgilendirme Formu ve Sözleşme’nin bir nüshası Alıcı’nın
                                    üyelik hesabında mevcuttur ve talep edilmesi halinde ayrıca elektronik posta ile de
                                    gönderilebilecektir.</p>
                                <h3 class="pre-contract-h3">2. <span>TANIMLAR</span></h3>
                                <p>Ön Bilgilendirme Formu ve Sözleşme’nin uygulanmasında ve yorumlanmasında aşağıda yazılı
                                    terimler karşılarındaki yazılı açıklamaları ifade edeceklerdir.</p>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>ALICI</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">Bir Mal veya Hizmet’i ticari veya mesleki
                                            olmayan amaçlarla edinen, kullanan veya yararlanan gerçek kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Bakanlık</strong></td>
                                        <td>:</td>
                                        <td>Türkiye Cumhuriyeti Ticaret Bakanlığı’nı,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Banka</strong></td>
                                        <td>:</td>
                                        <td>5411 sayılı Bankacılık Kanunu uyarınca kurulan lisanslı kuruluşları,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>DSM veya Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı</strong></td>
                                        <td>:</td>
                                        <td>Oluşturduğu sistem ile Satıcı’nın Ürün/Hizmet’i satışa sunduğu Platform’u
                                            işleten ve Satıcı adına mesafeli sözleşme kurulmasına aracılık eden DSM Grup
                                            Danışmanlık İletişim ve Satış Ticaret Anonim Şirketi’ni,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Hizmet</strong></td>
                                        <td>:</td>
                                        <td>Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen Ürün
                                            sağlama dışındaki her türlü tüketici işleminin konusunu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kanun</strong></td>
                                        <td>:</td>
                                        <td>6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi</strong></td>
                                        <td>:</td>
                                        <td>Ürün’ün Alıcı’ya ulaştırılmasını, iade süreçlerinde Alıcı’dan alınarak Satıcı
                                            veya DSM’ye ulaştırılmasını sağlayan anlaşmalı kargo veya lojistik şirketini,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ön Bilgilendirme Formu</strong></td>
                                        <td>:</td>
                                        <td>Sözleşme kurulmadan ya da buna karşılık herhangi bir teklif Alıcı tarafından
                                            kabul edilmeden önce Alıcı’yı Yönetmelik’te belirtilen asgari hususlar konusunda
                                            bilgilendirmek için hazırlanan formu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Platform</strong></td>
                                        <td>:</td>
                                        <td>DSM’ye ait www.trendyol.com adlı internet sitesini ve mobil uygulamasını,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı</strong></td>
                                        <td>:</td>
                                        <td>Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla
                                            tüketiciye Ürün/Hizmet sunan ya da Ürün/Hizmet sunanın adına ya da hesabına
                                            hareket eden ve aşağıda bilgileri bulunan gerçek ve/veya tüzel kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sözleşme</strong></td>
                                        <td>:</td>
                                        <td>Satıcı ve Alıcı arasında akdedilen Sözleşme’yi,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Trendyol Teslimat Noktası</strong></td>
                                        <td>:</td>
                                        <td>Alıcı’nın satın aldığı Ürünler’i kolayca teslim alabildiği anlaşmalı esnaf
                                            noktalarını, kargo şubelerini ve zincir mağazalarını,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ürün</strong></td>
                                        <td>:</td>
                                        <td>Alışverişe konu olan taşınır eşya, konut veya tatil amaçlı taşınmaz mallar ile
                                            elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri
                                            her türlü gayri maddi malı,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Yönetmelik</strong></td>
                                        <td>:</td>
                                        <td>Mesafeli Sözleşmeler Yönetmeliği’ni ifade eder.</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">3. <span>ALICI, SATICI VE ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI</span>
                                </h3>
                                <h3 class="distant-contract-h3">ALICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong>
                                        </td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Telefon</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Faks</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>E-posta/Kullanıcı Adı</strong></td>
                                        <td>:</td>
                                        <td>srcn.ozn5@gmail.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">SATICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Satıcının Ticaret Unvanı / Adı ve
                                                Soyadı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">TAMER ELEKTRİK İMALAT SANAYİ VE TİCARET
                                            LİMİTED ŞİRKETİ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Adresi</strong></td>
                                        <td>:</td>
                                        <td>ELEKTROKENT İŞ MERKEZİ 1467.CD NO:2/29
                                            İVEDİK O.S.B./OSTİM/ANKARA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0817002865600014</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>8170028656</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Telefonu</strong></td>
                                        <td>:</td>
                                        <td>5398474797</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>5398474797</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı KEP ve E-posta Bilgileri</strong></td>
                                        <td>:</td>
                                        <td>tamerelektrik@hs01.kep.tr</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı Unvanı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">DSM Grup Danışmanlık İletişim ve Satış
                                            Ticaret A.Ş.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Adresi</strong></td>
                                        <td>:</td>
                                        <td>Maslak Mahallesi Saat Sokak Spine Tower No:5 iç kapı:19 Sarıyer İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0313055766900016</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>Maslak VD- 3130557669</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Telefonu</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>0 212 332 18 93</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Şikâyet/Öneri Kanalları</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200 telefon numarası üzerinden ve Platform’da yer alan “Trendyol
                                            Asistan’a Sor” başlıklı alandan şikayet ve öneriler iletilebilecektir.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">4. <span>ÜRÜN/HİZMET BİLGİLERİ</span></h3>
                                <p><b>4.1.</b> Ürün/Hizmet’in temel özellikleri (türü, miktarı, marka/modeli, rengi, adedi,
                                    fiyatı) Platform’da yer almakta olup Platform üzerinden detaylı şekilde
                                    incelenebilecektir.</p>
                                <p><b>4.2.</b> Ürün/Hizmet karşılığında ödenecek tüm tutarlar (tüm vergiler dahil satış
                                    fiyatı, kargo bedeli, taksit farkı tutarı, açık pazar ve/veya diğer butiklerinden eş
                                    zamanlı olarak gerçekleştirilen alışverişlerde hak kazanılan toplam indirim tutarı vb.)
                                    aşağıdaki tabloda gösterilmiştir.</p>
                                <div style="margin-bottom:15px">
                                    <table class="pre-contract-main-table pre-contract-tables" style="width:100%">
                                        <tbody>
                                        <tr>
                                            <th>Ürün/Hizmet Açıklaması</th>
                                            <th>Adet</th>
                                            <th>Peşin Fiyatı</th>
                                            <th>Ara Toplam (KDV Dahil)</th>
                                        </tr>
                                        <tr>
                                            <td>Siyah Set Multi-let 6'lı Topraklı Çocuk Korumalı Grup Priz-3 Metre + 3'lü
                                                Yonca Fiş-priz
                                            </td>
                                            <td>1</td>
                                            <td>309.33 TL</td>
                                            <td>309.33 TL</td>
                                        </tr>
                                        <tr>
                                            <td>Kargo Tutarı</td>
                                            <td>-</td>
                                            <td>0.92 TL</td>
                                            <td>0.92 TL</td>
                                        </tr>
                                        <tr>
                                            <td>200 TL ve Üzeri Kargo Bedava (Satıcı Karşılar)</td>
                                            <td>-</td>
                                            <td>0.92 TL</td>
                                            <td>0.92 TL</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Toplam</td>
                                            <td>309.33 TL</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Kargo Hariç Toplam Ürün
                                                Bedeli</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">309.33 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Ücreti</strong></td>
                                        <td>:</td>
                                        <td>0.92 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Taksit Farkı</strong></td>
                                        <td>:</td>
                                        <td>0 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Toplam Sipariş Bedeli</strong></td>
                                        <td>:</td>
                                        <td>309.33 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ödeme Şekli ve Planı</strong></td>
                                        <td>:</td>
                                        <td>Tek Çekim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong></td>
                                        <td>:</td>
                                        <td>Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Fatura Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sipariş Tarihi</strong></td>
                                        <td>:</td>
                                        <td>21.2.2024</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Şekli</strong></td>
                                        <td>:</td>
                                        <td>Alıcıya Teslim veya Trendyol Teslimat Noktasına noktasına teslim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Süresi*</strong></td>
                                        <td>:</td>
                                        <td>En geç 30 gün</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi’ne Teslim Süresi**</strong>
                                        </td>
                                        <td>:</td>
                                        <td>2024-02-21</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>Teslim Şartları ürün sayfasında belirtildiği şekilde uygulanacaktır.</b></p>
                                <p>*Sözleşme ve ilgili mevzuat hükümlerinde yer alan istisnalar saklıdır.<br>**Belirtilen
                                    süre teslimatın taahhüdü değildir, satıcı tarafından kargo şirketine teslim edilme
                                    süresini ifade eder.</p>
                                <p><b>4.3. </b>SÖZ KONUSU ÜRÜN BEDELİ, “TRENDYOL ALICI GÜVENCESİ” KAPSAMINDA SATICI ADINA,
                                    DSM TARAFINDAN ALICI’DAN TAHSİL EDİLMEKTEDİR. ALICI MALIN BEDELİNİ DSM'YE ÖDEMEKLE, ÜRÜN
                                    BEDELİNİ SATICI’YA ÖDEMİŞ SAYILACAK VE BİR DAHA ÖDEME YÜKÜMLÜLÜĞÜ ALTINA GİRMEYECEKTİR.
                                    ALICI’NIN İLGİLİ MEVZUAT KAPSAMINDA İADE HAKLARI SAKLIDIR.</p>
                                <p><b>4.4. </b>KDV dahil satış fiyatı 45 TL olup, sepette yalnızca bir tane alınabilen
                                    Trendyol Pass, siparişten itibaren bir (1) ay boyunca geçerli olan 10 kargo hakkı
                                    sağlayan bir pakettir ve DSM tarafından sağlanmaktadır. Siparişten itibaren bir ayın
                                    sonunda kullanmamış olduğunuz, kalan haklarınızın geçerliliği sona erecek ve bir sonraki
                                    aya aktarılamayacaktır. Sepetinizde Trendyol Pass bulunması veya daha önce satın almış
                                    olduğunuz Trendyol Pass haklarınızın hala geçerli olması durumunda, kargo ücreti
                                    Trendyol Pass haklarınızdan mahsup edilecek olup, söz konusu siparişi ürünün kargoya
                                    verilmesini takiben sepetinizdeki ürünlerden herhangi birini iade etmeniz halinde
                                    Mesafeli Sözleşmeler Yönetmeliği’nin 15/1(h) maddesi çerçevesinde Trendyol Pass’e
                                    ilişkin cayma hakkınızı kullanamayacağınız için söz konusu siparişte kullanmış olduğunuz
                                    Trendyol Pass hakkınız veya Trendyol Pass ücreti tarafınıza iade edilemeyecektir.</p>
                                <h3 class="pre-contract-h3">5. <span>GENEL HÜKÜMLER</span></h3>
                                <p><b>5.1.</b> Satıcı, Ürün/Hizmet’i eksiksiz, siparişte belirtilen niteliklere uygun ve
                                    varsa garanti belgeleri, kullanım kılavuzları ile mevzuat gereği Ürün/Hizmet’le birlikte
                                    teslim etmesi gereken sair bilgi ve belgeler ile teslim etmeyi kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.2.</b> Ürün, Alıcı veya Alıcı tarafından belirlenen üçüncü kişiye, taahhüt edilen
                                    teslim süresi içerisinde ve her halükârda 30 (otuz) günlük yasal süreyi aşmamak koşulu
                                    ile, Alıcı’nın Platform’da belirtmiş olduğu teslimat adresine Kargo Şirketi tarafından
                                    teslim edilir. Bu süre içerisinde Satıcı’nın edimini yerine getirmemesi durumunda Alıcı
                                    Sözleşme'yi feshedebilecektir. Ancak Alıcı’nın isteği veya kişisel ihtiyaçları
                                    doğrultusunda hazırlanan Ürün/Hizmet satışlarında teslim süresi ilgili 30 (otuz) günü
                                    aşabilecektir. Ayrıca, sipariş durumu “Ön Sipariş” veya “Sipariş Üzerine Üretim” olarak
                                    belirtilen Ürün/Hizmet için teslimat süresi de 30 (otuz) günü aşabilecek olup Alıcı,
                                    Alıcı’nın isteği veya kişisel ihtiyaçları doğrultusunda hazırlanan “Sipariş Üzerine
                                    Üretim” ya da “Ön Sipariş” statüsünde olan bir Ürün/Hizmet satın aldığında teslimatın 30
                                    (otuz) gün içerisinde yapılmaması dolayısıyla Sözleşme’yi feshedemeyecektir.</p>
                                <p><b>5.3.</b> Satıcı Ürün’ü Kargo Şirketi aracılığı ile Alıcı’ya göndermekte ve teslim
                                    ettirmektedir. Kargo Şirketi’nin Alıcı’nın bulunduğu yerde şubesi olmaması halinde
                                    Alıcı’nın Ürün’ü Kargo Şirketi’nin Satıcı tarafından bildirilen yakın bir diğer
                                    şubesinden teslim alması gerekmektedir.</p>
                                <p><b>5.4.</b> Alıcı’nın sipariş esnasında Ürün’ü Trendyol Teslimat Noktası’na teslim
                                    edilmesini seçmesi halinde, Ürün, Kargo Şirketi tarafından Alıcı’nın seçmiş olduğu
                                    teslimat noktasına taahhüt edilen süre içerisinde ve her halükârda en geç 30 (otuz)
                                    günlük yasal süre içerisinde teslim edilecektir. Ürün’ün Trendyol Teslimat Noktası’na
                                    bırakılmasının ardından Alıcı, seçmiş olduğu teslimat adresi bilgilerinde kayıtlı olan
                                    telefon numarasına gelen kod ile en geç 3 (üç) gün içerisinde Ürün’ü teslim alacaktır.
                                </p>
                                <p><b>5.5.</b> Alıcı’nın herhangi bir nedenle Ürün/Hizmet’i teslim almaması halinde,
                                    Alıcı’nın Ürün/Hizmet’i iade ettiği kabul edilecek olup bu halde, varsa teslimat
                                    masrafları da dâhil olmak üzere Alıcı’dan tahsil edilen tüm ödemeler yasal süresi
                                    içerisinde Alıcı’ya iade edilecektir.</p>
                                <p><b>5.6.</b> Alıcı veya Alıcı tarafından belirlenen üçüncü kişinin teslim anında adreste
                                    bulunmaması durumunda Alıcı'nın Ürün/Hizmet’i geç teslim almasından ve/veya hiç teslim
                                    almamasından kaynaklanan zararlardan ve giderlerden Satıcı sorumlu değildir.</p>
                                <p><b>5.7.</b> Ürün/Hizmet’in teslimat masrafları aksine bir hüküm yoksa Alıcı’ya aittir.
                                    Satıcı, Platform’da teslimat ücretinin kendisince karşılanacağını beyan etmişse teslimat
                                    masrafları Satıcı'ya ait olacaktır.</p>
                                <p><b>5.8.</b> Satıcı, Sözleşme'den doğan ifa yükümlülüğünün süresi dolmadan Alıcı’yı
                                    Platform üzerinden bilgilendirmek ve açıkça onayını almak suretiyle muadil bir
                                    Ürün/Hizmet tedarik edebilecektir.</p>
                                <p><b>5.9.</b> Ürün/Hizmet ediminin yerine getirilmesinin imkansızlaştığı hallerde
                                    Satıcı’nın bu durumu öğrendiği tarihten itibaren 3 (üç) gün içinde Alıcı’ya yazılı
                                    olarak veya veri saklayıcısı ile bildirmesi ve varsa teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeleri bildirim tarihinden itibaren en geç 14 (ondört) gün
                                    içinde iade etmesi zorunludur. Ürün/Hizmet’in stokta bulunmaması durumu, Ürün/Hizmet
                                    ediminin yerine getirilmesinin imkânsızlaşması olarak kabul edilmez.</p>
                                <p><b>5.10.</b> Alıcı, Ürün’ü teslim almadan önce muayene edecek; ezik, kırık, ambalajı
                                    yırtılmış vb. hasarlı, ayıplı veya eksik Ürün/Hizmet’i teslim almayacaktır. Teslim
                                    alınan Ürün/Hizmet’in hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra
                                    Ürün’ün özenle korunması borcu, Alıcı’ya aittir. Cayma hakkı kullanılacaksa Ürün/Hizmet
                                    kullanılmamalı ve Ürün/Hizmet faturası ve teslim sırasında Alıcı’ya iletilen diğer tüm
                                    belgeler (örneğin garanti belgesi, kullanım kılavuzu vb.) ile birlikte iade edilmesi
                                    gerekmektedir.</p>
                                <p><b>5.11.</b> Alıcı, Sözleşme konusu bedeli ödemekle yükümlü olup, herhangi bir nedenle
                                    Sözleşme konusu bedelin ödenmemesinin ve/veya Banka kayıtlarında iptal edilmesinin
                                    Satıcı’nın Ürün/Hizmet’i teslim yükümlülüğü ile Sözleşme’den kaynaklanan sair
                                    yükümlülüklerinin sona ereceğini kabul, beyan ve taahhüt eder. Alıcı, herhangi bir
                                    sebeple Banka tarafından başarısız kodu gönderilen ancak buna rağmen Banka tarafından
                                    Satıcı’ya yapılan ödemelere ilişkin olarak, Satıcı’nın herhangi bir sorumluluğunun
                                    bulunmadığını kabul, beyan ve taahhüt eder.</p>
                                <p><b>5.12.</b> Alıcı, Ürün’ün teslim edilmesinden sonra Alıcı’ya ait kredi kartının
                                    yetkisiz kişilerce haksız kullanılması sonucunda Sözleşme konusu bedelin ilgili Banka
                                    tarafından Satıcı’ya ödenmemesi halinde, Alıcı Ürün’ü 3 (üç) gün içerisinde iade
                                    masrafları Alıcı’ya ait olacak şekilde Satıcı’ya iade edeceğini kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.13.</b> Sözleşme kapsamında herhangi bir nedenle Alıcı’ya bedel iadesi yapılması
                                    gereken durumlarda, Alıcı, ödemeyi kredi kartı ile yapmış olması halinde, Satıcı
                                    tarafından kredi kartına iade edilen tutarın banka tarafından Alıcı hesabına
                                    yansıtılmasına ilişkin ortalama sürecin 2 (iki) ile 3 (üç) haftayı bulabileceğini, bu
                                    tutarın Satıcı tarafından Banka’ya iadesinden sonra Alıcı’nın hesaplarına yansıması
                                    halinin tamamen Banka işlem süreci ile ilgili olduğunu ve olası gecikmelerde Banka’nın
                                    sorumlu olduğunu ve bunlar için DSM’yi ve Satıcı’yı sorumlu tutamayacağını kabul, beyan
                                    ve taahhüt eder.</p>
                                <p><b>5.14.</b> Alıcı ile sipariş esnasında kullanılan kredi kartı hamilinin aynı kişi
                                    olmaması veya Ürün/Hizmet’in Alıcı’ya tesliminden evvel, siparişte kullanılan kredi
                                    kartına ilişkin güvenlik açığı tespit edilmesi halinde, kredi kartı hamiline ilişkin
                                    kimlik ve iletişim bilgilerini, siparişte kullanılan kredi kartının bir önceki aya ait
                                    ekstresini yahut kart hamilinin Banka’dan kredi kartının kendisine ait olduğuna ilişkin
                                    yazıyı ibraz etmesini Alıcı’dan talep edilebilecektir. Alıcı’nın talebe konu
                                    bilgi/belgeleri temin etmesine kadar geçecek sürede sipariş dondurulacak olup, söz
                                    konusu taleplerin 24 (yirmidört) saat içerisinde karşılanmaması halinde ise Satıcı,
                                    siparişi iptal etme hakkını haizdir.</p>
                                <p><b>5.15.</b> Alıcı Sözleşme konusu bedeli Trendyol Cüzdan aracılığıyla ödemesi ve bu
                                    siparişe ilişkin cayma hakkını kullanması halinde cayma hakkından kaynaklı bedel iadesi
                                    Trendyol Cüzdan’a tek seferde yapılabilecektir.</p>
                                <p><b>5.16.</b> Sipariş edilmeyen Ürün/Hizmet’in gönderilmesi durumunda, Alıcı’ya karşı
                                    herhangi bir hak ileri sürülemez. Bu hallerde, Alıcı’nın sessiz kalması ya da söz konusu
                                    Ürün/Hizmet’i kullanmış olması, sözleşmenin kurulmasına yönelik kabul beyanı olarak
                                    yorumlanamaz.</p>
                                <p><b>5.17.</b> Alıcı’nın sipariş edebileceği Ürün/Hizmet adetlerine Platform’dan yapılacak
                                    duyurularla kısıt getirilebilir. Alıcı’nın Platform’dan yapılan duyurularda belirtilen
                                    adedin üzerinde Ürün/Hizmet sipariş etmek istemesi halinde sipariş vermesi
                                    engellenebilecek, siparişi verdikten sonra belirtilen adedin üstünde sipariş verdiğinin
                                    tespit edilmesi halinde ise belirtilen adedin üstündeki siparişleri iptal edilebilecek
                                    ve bu halde varsa iptal edilen siparişlere ilişkin teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeler yasal süresi içerisinde Alıcı’ya iade edilecektir.
                                    Alıcı işbu hususları kabul ederek siparişini oluşturduğunu, adet sınırlamasını geçen
                                    siparişlerinin engellenebileceği ve iptal edilebileceğini kabul, beyan ve taahhüt eder.
                                </p>
                                <p><b>5.18.</b> Satıcı’nın herhangi bir sebeple tedarik edemediği siparişler, Alıcı’nın
                                    onayının alınması halinde, mevzuattaki yasal teslim süresini aşmamak ve Alıcı’nın
                                    Ürün/Hizmet ile aynı özellikleri haiz olmak kaydıyla, bir başka satıcıya
                                    aktarılabilecektir. Böyle bir durumda Ürün/Hizmet yeni satıcı tarafından Alıcı’ya
                                    gönderilecek olup Sözleşme yeni satıcı ile Alıcı arasında kurulmuş olacaktır. Bu halde,
                                    Alıcı’ya herhangi bir ek bedel, ücret ve/veya masraf yansıtılmayacaktır.</p>
                                <p><b>5.19.</b> Alıcı tüketici sıfatıyla talep, şikayet ve önerilerini yukarıda yer alan
                                    Satıcı iletişim bilgilerini kullanmak suretiyle ve/veya Platform’un sağladığı kanallarla
                                    (0 212 331 0 200 telefon numarası üzerinden ve “Trendyol Asistan’a Sor” başlıklı
                                    alandan) ulaştırabilecektir.</p>
                                <h3 class="pre-contract-h3">6. <span>ÖZEL ŞARTLAR</span></h3>
                                <p><b>6.1.</b> Alıcı, aksi belirtilmedikçe, Platform’da birden fazla butikten tek bir
                                    sepette alışveriş yapabilecektir. Aynı sepet içerisinde farklı butikten alınan her bir
                                    Ürün/Hizmet için Satıcı tarafından birden fazla fatura kesilebilecektir. Şüpheye mahal
                                    bırakmamak bakımından belirtilmelidir ki, Satıcı, Alıcı’nın farklı butiklerden aldığı
                                    Ürün/Hizmet’in teslimatını mevzuattaki yasal süre içerisinde kalmak koşuluyla farklı
                                    zamanlarda gerçekleştirebilecektir.</p>
                                <p><b>6.2.</b> Alıcı’nın vereceği siparişlerde kurumsal fatura seçeneğini seçmesi durumunda
                                    Satıcı, Alıcı tarafından Platform üzerinden bildirilecek vergi kimlik numarası ve vergi
                                    dairesi bilgilerini kullanarak kurumsal fatura düzenleyecektir. Faturada yer alması
                                    gereken bilgilerin doğru, güncel ve eksiksiz girilmesi tamamen Alıcı’nın sorumluluğunda
                                    olup, bu sebeple doğabilecek tüm zararlardan bizzat Alıcı sorumludur.</p>
                                <p><b>6.3.</b> Platform üzerinden kredi kart ile ödeme yapılması halinde, Banka tarafından
                                    kampanyalar düzenlenerek Alıcı tarafından seçilen taksit adedinin daha üstünde bir
                                    taksit adedi uygulanabilecek veya taksit erteleme gibi ek hizmetler sunulabilecektir. Bu
                                    tür kampanyalar Banka’nın inisiyatifindedir. Alıcı’nın kredi kartının hesap kesim
                                    tarihinden itibaren sipariş toplamı taksit adedine bölünerek kredi kartı özetine Banka
                                    tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat farklarını dikkate alarak
                                    aylara eşit olarak dağıtmayabilir. Detaylı ödeme planlarının oluşturulması Banka’nın
                                    inisiyatifindedir.</p>
                                <p><b>6.4.</b> Dijital ürünler fiziki gönderime uygun olmayıp, teslimat ürün niteliğine göre
                                    şartlarında belirtilen şekilde gerçekleştirilecektir. Sözleşme’nin yer alıp da teslimat
                                    şekilleri vb. gibi fiziki ürünler için geçerli olan düzenlemeler dijital ürünlere
                                    uygulanmayacak olup bu maddelerdeki düzenlemeler uygulanabilir olduğu ölçüde ürün
                                    şartlarında belirtilen koşul ve açıklamalara uygun olacak şeklinde yorumlanmalıdır.</p>
                                <p><b>6.5.</b>Sipariş verilen Ürün’ün elektrikli motosiklet olması halinde kurulumu
                                    gerçekleştikten veya tescil işlemi yapılıp ruhsatlandıktan sonra Platform üzerinden
                                    iadesi mümkün olmamaktadır.</p>
                                <p><b>6.6.</b> Platformda satışa sunulan Ürün/Hizmetler yalnızca Satıcı tarafından
                                    belirlenen sınırlı lokasyonlara (il/ilçe/bölge) teslim edilmek üzere satışa
                                    sunulabilecek olup, sipariş sürecinde Alıcı'nın bu ürün/hizmetler için teslimat adresini
                                    Satıcı tarafından belirlenmiş olan lokasyonlardan biri dışında seçmesi halinde ilgili
                                    sipariş verilemeyecek/satın alım gerçekleşmeyecektir.</p>
                                <p><b>6.7.</b>Türkiye Cumhuriyeti resmi kamu kurum ve kuruluşları ile koordineli yürütülen
                                    "Depreme Yardım Seferberliği" ve benzeri seferberlik ve yardım işlemleriyle bağlantılı
                                    siparişlerde (ö: koli yardımı, vb.), Mesafeli Sözleşmeler Yönetmeliği’nin 15/1-h maddesi
                                    gereği cayma hakkı kullanılamayacaktır.</p>
                                <h3 class="pre-contract-h3">7.
                                    <span>KİŞİSEL VERİLERİN KORUNMASI VE FİKRİ-SINAİ HAKLAR</span></h3>
                                <p><b>7.1.</b> Satıcı, işbu sözleşme kapsamındaki kişisel verileri sadece Ürün/Hizmet’in
                                    sunulması amacıyla sınırlı olarak ve 6698 sayılı Kişisel Verilerin Korunması Kanunu’na,
                                    (“KVKK”) ikincil mevzuata ve Kişisel Verileri Koruma Kurulu kararlarına uygun olarak
                                    işleyecektir. Satıcı, Platform üzerinden eriştiği kişisel veriler haricinde Alıcı’nın
                                    kişisel verilerini işlemeyeceğini ve Platform üzerinden sağlanan yöntemler dışında Alıcı
                                    ile harici olarak iletişime geçmeyeceğini kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.2.</b> Alıcı, işbu Sözleşme kapsamında sağladığı kişisel verilerin doğru, eksiksiz
                                    ve güncel olduğunu kontrol etmekle, bu bilgileri üçüncü kişilerle paylaşmamak, ilgisiz
                                    kişilerce erişilememesi için virüs ve benzeri zararlı uygulamalara ilişkin olanlar dahil
                                    gerekli tedbirleri almak ve söz konusu kişisel verilerin güvenliğini sağlamakla yükümlü
                                    olduğunu, aksi halde doğacak zararlardan ve üçüncü kişilerden gelen taleplerden bizzat
                                    sorumlu olduğunu kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.3.</b> Platform’a ait her türlü bilgi ve içerik ile bunların düzenlenmesi, revizyonu
                                    ve kısmen/tamamen kullanımı konusunda; Satıcı'nın anlaşmasına göre diğer üçüncü
                                    şahıslara ait olanlar hariç; tüm fikri-sınai haklar ve mülkiyet hakları DSM’ye aittir.
                                </p>
                                <h3 class="pre-contract-h3">8. <span>CAYMA HAKKI</span></h3>
                                <p><b>8.1.</b> Alıcı, 15 (onbeş) gün içinde herhangi bir gerekçe göstermeksizin ve cezai
                                    şart ödemeksizin Sözleşme’den cayma hakkına sahiptir.</p>
                                <p><b>8.2.</b> Cayma hakkı süresi, Hizmet için Sözleşme’nin kurulduğu gün; Ürün için
                                    Alıcı’nın veya Alıcı tarafından belirlenen üçüncü kişinin Ürün’ü teslim aldığı gün
                                    başlar. Ancak Alıcı, Sözleşme’nin kurulmasından Ürün teslimine kadar olan süre içinde de
                                    cayma hakkını kullanabilir.</p>
                                <p><b>8.3.</b> Cayma hakkı süresinin belirlenmesinde;</p>
                                <p><b>a)</b> Tek sipariş konusu olup ayrı ayrı teslim edilen Ürün’de, Alıcı veya Alıcı
                                    tarafından belirlenen üçüncü kişinin son Ürün’ü teslim aldığı gün,</p>
                                <p><b>b)</b> Birden fazla parçadan oluşan Ürün’de, Alıcı veya Alıcı tarafından belirlenen
                                    üçüncü kişinin son parçayı teslim aldığı gün,</p>
                                <p><b>c)</b> Belirli bir süre boyunca Ürün’ün düzenli tesliminin yapıldığı durumlarda, Alıcı
                                    veya Alıcı tarafından belirlenen üçüncü kişinin ilk Ürün’ü teslim aldığı gün</p>
                                <p>esas alınır.</p>
                                <p><b>8.4.</b> Ürün teslimi ile Hizmet ifasının birlikte olduğu durumlarda, Ürün teslimine
                                    ilişkin cayma hakkı hükümleri uygulanır.</p>
                                <p><b>8.5.</b> Satıcı;</p>
                                <p><b>a)</b> Ürün'ün teslimi veya Hizmet’in ifasından önce Alıcı’nın cayma hakkını
                                    kullanması durumunda cayma hakkının kullanıldığına ilişkin bildirimin kendisine ulaştığı
                                    tarihten itibaren,</p>
                                <p><b>b)</b> Ürün’ün tesliminden sonra Alıcı’nın cayma hakkını kullanması durumunda, cayma
                                    bildiriminin kendisine ulaştığı tarih itibarıyla bedel Satıcı’ya aktarılmamışsa cayma
                                    hakkına konu Ürün’ün, iade için öngörülen Kargo Şirketi’ne teslim edildiği tarihten veya
                                    iade için öngörülenin haricinde bir Kargo Şirketi ile iade edilmesi durumunda da
                                    Satıcı’ya ulaştığı tarihten itibaren,</p>
                                <p><b>c)</b> Alıcı’nın siparişinin yasal süre içerisinde teslim edilememesi nedeniyle
                                    Sözleşme’yi fesih hakkını kullanması durumunda fesih bildiriminin kendisine ulaştığı
                                    tarihten itibaren</p>
                                <p>15 (onbeş) gün içinde, tahsil ettiği Sözleşme konusu bedeli ile teslimat masraflarının
                                    Alıcı’ya iadesinden sorumludur.</p>
                                <p><b>8.6.</b> Cayma hakkı bildiriminin ve Sözleşme’ye ilişkin diğer bildirimlerin mevzuata
                                    uygun ve süresi içerisinde Platform’da belirtilen DSM’ye ve/veya Satıcı’ya ait iletişim
                                    kanallarından yapılması şarttır. Cayma bildiriminin yapılacağı iletişim kanallarına
                                    https://www.trendyol.com/iletisim.html linkinden ulaşılabilmektedir.</p>
                                <p><b>8.7.</b> Cayma hakkının kullanılması halinde:</p>
                                <p><b>a)</b> Alıcı cayma hakkını kullanmasından itibaren 14 (ondört) gün içerisinde Ürün’ü
                                    Satıcı'ya Kargo Şirketi’yle geri gönderir.</p>
                                <p><b>b)</b> Cayma hakkı kapsamında iade edilecek Ürün kutusu, ambalajı, varsa standart
                                    aksesuarları ve varsa Ürün ile birlikte hediye edilen diğer Ürünler’in de eksiksiz ve
                                    hasarsız olarak iade edilmesi gerekmektedir.</p>
                                <p><b>8.8.</b> Alıcı cayma süresi içinde Ürün’ü, işleyişine, teknik özelliklerine ve
                                    kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana gelen değişiklik ve
                                    bozulmalardan sorumlu değildir.</p>
                                <p><b>8.9.</b> Cayma hakkının kullanılmasını takip eden 14 (ondört) gün içerisinde Sözleşme
                                    konusu bedeller Alıcı’ya Alıcı’nın ödeme yöntemi ile iade edilmektedir. Ürün/Hizmet,
                                    Satıcı'ya iade edilirken, Ürün/Hizmet’in teslimi sırasında Alıcı’ya ibraz edilmiş olan
                                    orijinal faturanın da Alıcı tarafından iade edilmesi gerekmektedir. Alıcı’nın kurumsal
                                    fatura istemesi halinde ilgili Ürün/Hizmet iadesi için iade faturası kesmesi veya
                                    mümkünse süresi içerisinde ticari faturayı kendi sistemlerinden reddetmesi
                                    gerekmektedir.</p>
                                <p><b>8.10.</b> Alıcı iade edeceği Ürün/Hizmet’i Ön Bilgilendirme Formu’nda belirtilen
                                    Satıcı'nın Kargo Şirketi ile Satıcı'ya gönderdiği sürece iade kargo bedeli Satıcı'ya
                                    aittir. İade için Alıcı’nın bulunduğu yerde Satıcı’nın Kargo Şirketi şubesi bulunmaması
                                    halinde, Alıcı Ürün’ü herhangi bir Kargo Şirketi’yle gönderebilecektir. Bu halde iade
                                    kargo bedeli ve Ürün’ün kargo sürecinde uğrayacağı hasardan Satıcı sorumludur.</p>
                                <p><b>8.11.</b> Alıcı cayma hakkını işbu maddede belirtilen süre ve usuller dahilinde
                                    kullanacak olup aksi halde cayma hakkını kaybedecektir.</p>
                                <h3 class="pre-contract-h3">9. <span>CAYMA HAKKININ KULLANILAMAYACAĞI HALLER</span></h3>
                                <p><b>9.1.</b> Alıcı aşağıdaki sözleşmelerde cayma hakkını kullanamaz:</p>
                                <p><b>a) </b>Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı
                                    veya DSM’nin kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler,</p>
                                <p><b>b) </b>Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                    ilişkin sözleşmeler,</p>
                                <p><b>c) </b>Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine
                                    ilişkin sözleşmeler,</p>
                                <p><b>d)</b> Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                    olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin
                                    sözleşmeler,</p>
                                <p><b>e) </b>Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması
                                    mümkün olmayan mallara ilişkin sözleşmeler,</p>
                                <p><b>f)</b>Ürünün tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları
                                    açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf
                                    malzemelerine ilişkin sözleşmeler,</p>
                                <p><b>g)</b>Abonelik sözleşmesi kapsamında sağlananlar dışında gazete ve dergi gibi süreli
                                    yayınların teslimine ilişkin sözleşmeler,</p>
                                <p><b>h)</b>Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma,
                                    araba kiralama, yiyecek içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş
                                    zamanın değerlendirilmesine ilişkin sözleşmeler,</p>
                                <p><b>i)</b> Elektronik ortamda anında ifa edilen hizmetler ile Alıcı’ya anında teslim
                                    edilen gayri maddi mallara ilişkin sözleşmeler,</p>
                                <p><b>j)</b> Cayma hakkı süresi sona ermeden önce, Alıcı’nın onayı ile ifasına başlanan
                                    hizmetlere ilişkin sözleşmeler,</p>
                                <p>cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.2.</b> Ürün/Hizmet’in Yönetmelik'in uygulama alanı dışında bırakılmış olan <i>(Sözleşme’nin
                                        3.3. maddesinde listelenmiştir)</i> Ürün/Hizmet türlerinden müteşekkil olması halinde
                                    Alıcı ve Satıcı arasındaki hukuki ilişkiye Yönetmelik hükümleri uygulanamaması sebebiyle
                                    cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.3.</b> Platform üzerinden elektronik kod satın alındığı durumlarda bahse konu
                                    siparişlerde Yönetmelik gereği cayma hakkı söz konusu olmayacaktır. Bu siparişler
                                    bakımından Platform üzerinden iade kodu da oluşturulamayacaktır.</p>
                                <h3 class="pre-contract-h3">10. <span>UYUŞMAZLIKLARIN ÇÖZÜMÜ</span></h3>
                                <p><b>10.1</b>Sözleşme’nin uygulanmasında, Bakanlık’ça ilan edilen değerlere uygun olarak
                                    Alıcı’nın Ürün/Hizmet’i satın aldığı ve ikametgahının bulunduğu yerdeki Tüketici Hakem
                                    Heyetleri ile Tüketici Mahkemeleri yetkilidir.</p>
                                <h3 class="pre-contract-h3 pre-contract-title">ÖN BİLGİLENDİRME FORMU</h3>
                                <h3 class="pre-contract-h3">1. <span>TARAFLAR VE KONU</span></h3>
                                <p>İşbu Ön Bilgilendirme Formu’nun konusu, Alıcı ve Satıcı arasındaki Sözleşme’ye ilişkin
                                    Kanun ve Yönetmelik hükümleri uyarınca bilgilendirilmesidir. Ayrıca Yönetmelik uyarınca
                                    yer verilmesi zorunlu olan hususlar Ön Bilgilendirme Formu’nda yer almaktadır.</p>
                                <p>ALICI, Ön Bilgilendirme Formu ve Sözleşme’ye ilişkin bilgileri üyeliğinin bağlı olduğu
                                    “Hesabım” sayfasından takip edebilecek olup değişen bilgilerini bu sayfa üstünden
                                    güncelleyebilecektir. Ön Bilgilendirme Formu ve Sözleşme’nin bir nüshası Alıcı’nın
                                    üyelik hesabında mevcuttur ve talep edilmesi halinde ayrıca elektronik posta ile de
                                    gönderilebilecektir.</p>
                                <h3 class="pre-contract-h3">2. <span>TANIMLAR</span></h3>
                                <p>Ön Bilgilendirme Formu ve Sözleşme’nin uygulanmasında ve yorumlanmasında aşağıda yazılı
                                    terimler karşılarındaki yazılı açıklamaları ifade edeceklerdir.</p>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>ALICI</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">Bir Mal veya Hizmet’i ticari veya mesleki
                                            olmayan amaçlarla edinen, kullanan veya yararlanan gerçek kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Bakanlık</strong></td>
                                        <td>:</td>
                                        <td>Türkiye Cumhuriyeti Ticaret Bakanlığı’nı,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Banka</strong></td>
                                        <td>:</td>
                                        <td>5411 sayılı Bankacılık Kanunu uyarınca kurulan lisanslı kuruluşları,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>DSM veya Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı</strong></td>
                                        <td>:</td>
                                        <td>Oluşturduğu sistem ile Satıcı’nın Ürün/Hizmet’i satışa sunduğu Platform’u
                                            işleten ve Satıcı adına mesafeli sözleşme kurulmasına aracılık eden DSM Grup
                                            Danışmanlık İletişim ve Satış Ticaret Anonim Şirketi’ni,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Hizmet</strong></td>
                                        <td>:</td>
                                        <td>Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen Ürün
                                            sağlama dışındaki her türlü tüketici işleminin konusunu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kanun</strong></td>
                                        <td>:</td>
                                        <td>6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi</strong></td>
                                        <td>:</td>
                                        <td>Ürün’ün Alıcı’ya ulaştırılmasını, iade süreçlerinde Alıcı’dan alınarak Satıcı
                                            veya DSM’ye ulaştırılmasını sağlayan anlaşmalı kargo veya lojistik şirketini,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ön Bilgilendirme Formu</strong></td>
                                        <td>:</td>
                                        <td>Sözleşme kurulmadan ya da buna karşılık herhangi bir teklif Alıcı tarafından
                                            kabul edilmeden önce Alıcı’yı Yönetmelik’te belirtilen asgari hususlar konusunda
                                            bilgilendirmek için hazırlanan formu,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Platform</strong></td>
                                        <td>:</td>
                                        <td>DSM’ye ait www.trendyol.com adlı internet sitesini ve mobil uygulamasını,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı</strong></td>
                                        <td>:</td>
                                        <td>Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla
                                            tüketiciye Ürün/Hizmet sunan ya da Ürün/Hizmet sunanın adına ya da hesabına
                                            hareket eden ve aşağıda bilgileri bulunan gerçek ve/veya tüzel kişiyi,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sözleşme</strong></td>
                                        <td>:</td>
                                        <td>Satıcı ve Alıcı arasında akdedilen Sözleşme’yi,</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Trendyol Teslimat Noktası</strong></td>
                                        <td>:</td>
                                        <td>Alıcı’nın satın aldığı Ürünler’i kolayca teslim alabildiği anlaşmalı esnaf
                                            noktalarını, kargo şubelerini ve zincir mağazalarını,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ürün</strong></td>
                                        <td>:</td>
                                        <td>Alışverişe konu olan taşınır eşya, konut veya tatil amaçlı taşınmaz mallar ile
                                            elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri
                                            her türlü gayri maddi malı,
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Yönetmelik</strong></td>
                                        <td>:</td>
                                        <td>Mesafeli Sözleşmeler Yönetmeliği’ni ifade eder.</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">3. <span>ALICI, SATICI VE ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI</span>
                                </h3>
                                <h3 class="distant-contract-h3">ALICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong>
                                        </td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Telefon</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Faks</strong></td>
                                        <td>:</td>
                                        <td>543*****76</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>E-posta/Kullanıcı Adı</strong></td>
                                        <td>:</td>
                                        <td>srcn.ozn5@gmail.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">SATICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Satıcının Ticaret Unvanı / Adı ve
                                                Soyadı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">TNS BİLİŞİM ELEKTRONİK SANAYİ VE DIŞ
                                            TİCARET LİMİTED ŞİRKETİ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Adresi</strong></td>
                                        <td>:</td>
                                        <td>Türkmen Mahallesi Ödemiş Ayakkabıcılar Sitesi No:49 Blok:A/10</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0845032587200015</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>8450325872</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Telefonu</strong></td>
                                        <td>:</td>
                                        <td>5061685248</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcının Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>5061685248</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Satıcı KEP ve E-posta Bilgileri</strong></td>
                                        <td>:</td>
                                        <td>tnsbilisimelktroniksanayi@hs01.kep.tr</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="distant-contract-h3">ELEKTRONİK TİCARET ARACI HİZMET SAĞLAYICI BİLGİLERİ</h3>
                                <table class="distant-contract-all-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet
                                                Sağlayıcı Unvanı</strong></td>
                                        <td>:</td>
                                        <td class="distant-contract-text-align-left">DSM Grup Danışmanlık İletişim ve Satış
                                            Ticaret A.Ş.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Adresi</strong></td>
                                        <td>:</td>
                                        <td>Maslak Mahallesi Saat Sokak Spine Tower No:5 iç kapı:19 Sarıyer İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Mersis Numarası</strong></td>
                                        <td>:</td>
                                        <td>0313055766900016</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Vergi Kimlik Numarası</strong></td>
                                        <td>:</td>
                                        <td>Maslak VD- 3130557669</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Telefonu</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Faks Numarası</strong></td>
                                        <td>:</td>
                                        <td>0 212 332 18 93</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Elektronik Ticaret Aracı Hizmet Sağlayıcı
                                                Şikâyet/Öneri Kanalları</strong></td>
                                        <td>:</td>
                                        <td>0 212 331 0 200 telefon numarası üzerinden ve Platform’da yer alan “Trendyol
                                            Asistan’a Sor” başlıklı alandan şikayet ve öneriler iletilebilecektir.
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h3 class="pre-contract-h3">4. <span>ÜRÜN/HİZMET BİLGİLERİ</span></h3>
                                <p><b>4.1.</b> Ürün/Hizmet’in temel özellikleri (türü, miktarı, marka/modeli, rengi, adedi,
                                    fiyatı) Platform’da yer almakta olup Platform üzerinden detaylı şekilde
                                    incelenebilecektir.</p>
                                <p><b>4.2.</b> Ürün/Hizmet karşılığında ödenecek tüm tutarlar (tüm vergiler dahil satış
                                    fiyatı, kargo bedeli, taksit farkı tutarı, açık pazar ve/veya diğer butiklerinden eş
                                    zamanlı olarak gerçekleştirilen alışverişlerde hak kazanılan toplam indirim tutarı vb.)
                                    aşağıdaki tabloda gösterilmiştir.</p>
                                <div style="margin-bottom:15px">
                                    <table class="pre-contract-main-table pre-contract-tables" style="width:100%">
                                        <tbody>
                                        <tr>
                                            <th>Ürün/Hizmet Açıklaması</th>
                                            <th>Adet</th>
                                            <th>Peşin Fiyatı</th>
                                            <th>Ara Toplam (KDV Dahil)</th>
                                        </tr>
                                        <tr>
                                            <td>Pesto Smart Çok Amaçlı Wi-Fi Airfryer &amp; Fırın 12 lt</td>
                                            <td>1</td>
                                            <td>11499 TL</td>
                                            <td>11499 TL</td>
                                        </tr>
                                        <tr>
                                            <td>Kargo Tutarı</td>
                                            <td>-</td>
                                            <td>34.07 TL</td>
                                            <td>34.07 TL</td>
                                        </tr>
                                        <tr>
                                            <td>200 TL ve Üzeri Kargo Bedava (Satıcı Karşılar)</td>
                                            <td>-</td>
                                            <td>34.07 TL</td>
                                            <td>34.07 TL</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Toplam</td>
                                            <td>11499 TL</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="pre-contract-tables">
                                    <tbody>
                                    <tr>
                                        <td width="200" style="vertical-align:top"><strong>Kargo Hariç Toplam Ürün
                                                Bedeli</strong></td>
                                        <td>:</td>
                                        <td class="pre-contract-text-align-left">11499 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Ücreti</strong></td>
                                        <td>:</td>
                                        <td>34.07 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Taksit Farkı</strong></td>
                                        <td>:</td>
                                        <td>0 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Toplam Sipariş Bedeli</strong></td>
                                        <td>:</td>
                                        <td>11499 TL</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Ödeme Şekli ve Planı</strong></td>
                                        <td>:</td>
                                        <td>Tek Çekim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Edilecek Kişi</strong></td>
                                        <td>:</td>
                                        <td>Sercan Özen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Fatura Adresi</strong></td>
                                        <td>:</td>
                                        <td>Güzeltepe mahallesi metin sokak no 19 daire 23/İstanbul</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Sipariş Tarihi</strong></td>
                                        <td>:</td>
                                        <td>21.2.2024</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslim Şekli</strong></td>
                                        <td>:</td>
                                        <td>Alıcıya Teslim veya Trendyol Teslimat Noktasına noktasına teslim</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Teslimat Süresi*</strong></td>
                                        <td>:</td>
                                        <td>En geç 30 gün</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top"><strong>Kargo Şirketi’ne Teslim Süresi**</strong>
                                        </td>
                                        <td>:</td>
                                        <td>2024-02-21</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p><b>Teslim Şartları ürün sayfasında belirtildiği şekilde uygulanacaktır.</b></p>
                                <p>*Sözleşme ve ilgili mevzuat hükümlerinde yer alan istisnalar saklıdır.<br>**Belirtilen
                                    süre teslimatın taahhüdü değildir, satıcı tarafından kargo şirketine teslim edilme
                                    süresini ifade eder.</p>
                                <p><b>4.3. </b>SÖZ KONUSU ÜRÜN BEDELİ, “TRENDYOL ALICI GÜVENCESİ” KAPSAMINDA SATICI ADINA,
                                    DSM TARAFINDAN ALICI’DAN TAHSİL EDİLMEKTEDİR. ALICI MALIN BEDELİNİ DSM'YE ÖDEMEKLE, ÜRÜN
                                    BEDELİNİ SATICI’YA ÖDEMİŞ SAYILACAK VE BİR DAHA ÖDEME YÜKÜMLÜLÜĞÜ ALTINA GİRMEYECEKTİR.
                                    ALICI’NIN İLGİLİ MEVZUAT KAPSAMINDA İADE HAKLARI SAKLIDIR.</p>
                                <p><b>4.4. </b>KDV dahil satış fiyatı 45 TL olup, sepette yalnızca bir tane alınabilen
                                    Trendyol Pass, siparişten itibaren bir (1) ay boyunca geçerli olan 10 kargo hakkı
                                    sağlayan bir pakettir ve DSM tarafından sağlanmaktadır. Siparişten itibaren bir ayın
                                    sonunda kullanmamış olduğunuz, kalan haklarınızın geçerliliği sona erecek ve bir sonraki
                                    aya aktarılamayacaktır. Sepetinizde Trendyol Pass bulunması veya daha önce satın almış
                                    olduğunuz Trendyol Pass haklarınızın hala geçerli olması durumunda, kargo ücreti
                                    Trendyol Pass haklarınızdan mahsup edilecek olup, söz konusu siparişi ürünün kargoya
                                    verilmesini takiben sepetinizdeki ürünlerden herhangi birini iade etmeniz halinde
                                    Mesafeli Sözleşmeler Yönetmeliği’nin 15/1(h) maddesi çerçevesinde Trendyol Pass’e
                                    ilişkin cayma hakkınızı kullanamayacağınız için söz konusu siparişte kullanmış olduğunuz
                                    Trendyol Pass hakkınız veya Trendyol Pass ücreti tarafınıza iade edilemeyecektir.</p>
                                <h3 class="pre-contract-h3">5. <span>GENEL HÜKÜMLER</span></h3>
                                <p><b>5.1.</b> Satıcı, Ürün/Hizmet’i eksiksiz, siparişte belirtilen niteliklere uygun ve
                                    varsa garanti belgeleri, kullanım kılavuzları ile mevzuat gereği Ürün/Hizmet’le birlikte
                                    teslim etmesi gereken sair bilgi ve belgeler ile teslim etmeyi kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.2.</b> Ürün, Alıcı veya Alıcı tarafından belirlenen üçüncü kişiye, taahhüt edilen
                                    teslim süresi içerisinde ve her halükârda 30 (otuz) günlük yasal süreyi aşmamak koşulu
                                    ile, Alıcı’nın Platform’da belirtmiş olduğu teslimat adresine Kargo Şirketi tarafından
                                    teslim edilir. Bu süre içerisinde Satıcı’nın edimini yerine getirmemesi durumunda Alıcı
                                    Sözleşme'yi feshedebilecektir. Ancak Alıcı’nın isteği veya kişisel ihtiyaçları
                                    doğrultusunda hazırlanan Ürün/Hizmet satışlarında teslim süresi ilgili 30 (otuz) günü
                                    aşabilecektir. Ayrıca, sipariş durumu “Ön Sipariş” veya “Sipariş Üzerine Üretim” olarak
                                    belirtilen Ürün/Hizmet için teslimat süresi de 30 (otuz) günü aşabilecek olup Alıcı,
                                    Alıcı’nın isteği veya kişisel ihtiyaçları doğrultusunda hazırlanan “Sipariş Üzerine
                                    Üretim” ya da “Ön Sipariş” statüsünde olan bir Ürün/Hizmet satın aldığında teslimatın 30
                                    (otuz) gün içerisinde yapılmaması dolayısıyla Sözleşme’yi feshedemeyecektir.</p>
                                <p><b>5.3.</b> Satıcı Ürün’ü Kargo Şirketi aracılığı ile Alıcı’ya göndermekte ve teslim
                                    ettirmektedir. Kargo Şirketi’nin Alıcı’nın bulunduğu yerde şubesi olmaması halinde
                                    Alıcı’nın Ürün’ü Kargo Şirketi’nin Satıcı tarafından bildirilen yakın bir diğer
                                    şubesinden teslim alması gerekmektedir.</p>
                                <p><b>5.4.</b> Alıcı’nın sipariş esnasında Ürün’ü Trendyol Teslimat Noktası’na teslim
                                    edilmesini seçmesi halinde, Ürün, Kargo Şirketi tarafından Alıcı’nın seçmiş olduğu
                                    teslimat noktasına taahhüt edilen süre içerisinde ve her halükârda en geç 30 (otuz)
                                    günlük yasal süre içerisinde teslim edilecektir. Ürün’ün Trendyol Teslimat Noktası’na
                                    bırakılmasının ardından Alıcı, seçmiş olduğu teslimat adresi bilgilerinde kayıtlı olan
                                    telefon numarasına gelen kod ile en geç 3 (üç) gün içerisinde Ürün’ü teslim alacaktır.
                                </p>
                                <p><b>5.5.</b> Alıcı’nın herhangi bir nedenle Ürün/Hizmet’i teslim almaması halinde,
                                    Alıcı’nın Ürün/Hizmet’i iade ettiği kabul edilecek olup bu halde, varsa teslimat
                                    masrafları da dâhil olmak üzere Alıcı’dan tahsil edilen tüm ödemeler yasal süresi
                                    içerisinde Alıcı’ya iade edilecektir.</p>
                                <p><b>5.6.</b> Alıcı veya Alıcı tarafından belirlenen üçüncü kişinin teslim anında adreste
                                    bulunmaması durumunda Alıcı'nın Ürün/Hizmet’i geç teslim almasından ve/veya hiç teslim
                                    almamasından kaynaklanan zararlardan ve giderlerden Satıcı sorumlu değildir.</p>
                                <p><b>5.7.</b> Ürün/Hizmet’in teslimat masrafları aksine bir hüküm yoksa Alıcı’ya aittir.
                                    Satıcı, Platform’da teslimat ücretinin kendisince karşılanacağını beyan etmişse teslimat
                                    masrafları Satıcı'ya ait olacaktır.</p>
                                <p><b>5.8.</b> Satıcı, Sözleşme'den doğan ifa yükümlülüğünün süresi dolmadan Alıcı’yı
                                    Platform üzerinden bilgilendirmek ve açıkça onayını almak suretiyle muadil bir
                                    Ürün/Hizmet tedarik edebilecektir.</p>
                                <p><b>5.9.</b> Ürün/Hizmet ediminin yerine getirilmesinin imkansızlaştığı hallerde
                                    Satıcı’nın bu durumu öğrendiği tarihten itibaren 3 (üç) gün içinde Alıcı’ya yazılı
                                    olarak veya veri saklayıcısı ile bildirmesi ve varsa teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeleri bildirim tarihinden itibaren en geç 14 (ondört) gün
                                    içinde iade etmesi zorunludur. Ürün/Hizmet’in stokta bulunmaması durumu, Ürün/Hizmet
                                    ediminin yerine getirilmesinin imkânsızlaşması olarak kabul edilmez.</p>
                                <p><b>5.10.</b> Alıcı, Ürün’ü teslim almadan önce muayene edecek; ezik, kırık, ambalajı
                                    yırtılmış vb. hasarlı, ayıplı veya eksik Ürün/Hizmet’i teslim almayacaktır. Teslim
                                    alınan Ürün/Hizmet’in hasarsız ve sağlam olduğu kabul edilecektir. Teslimden sonra
                                    Ürün’ün özenle korunması borcu, Alıcı’ya aittir. Cayma hakkı kullanılacaksa Ürün/Hizmet
                                    kullanılmamalı ve Ürün/Hizmet faturası ve teslim sırasında Alıcı’ya iletilen diğer tüm
                                    belgeler (örneğin garanti belgesi, kullanım kılavuzu vb.) ile birlikte iade edilmesi
                                    gerekmektedir.</p>
                                <p><b>5.11.</b> Alıcı, Sözleşme konusu bedeli ödemekle yükümlü olup, herhangi bir nedenle
                                    Sözleşme konusu bedelin ödenmemesinin ve/veya Banka kayıtlarında iptal edilmesinin
                                    Satıcı’nın Ürün/Hizmet’i teslim yükümlülüğü ile Sözleşme’den kaynaklanan sair
                                    yükümlülüklerinin sona ereceğini kabul, beyan ve taahhüt eder. Alıcı, herhangi bir
                                    sebeple Banka tarafından başarısız kodu gönderilen ancak buna rağmen Banka tarafından
                                    Satıcı’ya yapılan ödemelere ilişkin olarak, Satıcı’nın herhangi bir sorumluluğunun
                                    bulunmadığını kabul, beyan ve taahhüt eder.</p>
                                <p><b>5.12.</b> Alıcı, Ürün’ün teslim edilmesinden sonra Alıcı’ya ait kredi kartının
                                    yetkisiz kişilerce haksız kullanılması sonucunda Sözleşme konusu bedelin ilgili Banka
                                    tarafından Satıcı’ya ödenmemesi halinde, Alıcı Ürün’ü 3 (üç) gün içerisinde iade
                                    masrafları Alıcı’ya ait olacak şekilde Satıcı’ya iade edeceğini kabul, beyan ve taahhüt
                                    eder.</p>
                                <p><b>5.13.</b> Sözleşme kapsamında herhangi bir nedenle Alıcı’ya bedel iadesi yapılması
                                    gereken durumlarda, Alıcı, ödemeyi kredi kartı ile yapmış olması halinde, Satıcı
                                    tarafından kredi kartına iade edilen tutarın banka tarafından Alıcı hesabına
                                    yansıtılmasına ilişkin ortalama sürecin 2 (iki) ile 3 (üç) haftayı bulabileceğini, bu
                                    tutarın Satıcı tarafından Banka’ya iadesinden sonra Alıcı’nın hesaplarına yansıması
                                    halinin tamamen Banka işlem süreci ile ilgili olduğunu ve olası gecikmelerde Banka’nın
                                    sorumlu olduğunu ve bunlar için DSM’yi ve Satıcı’yı sorumlu tutamayacağını kabul, beyan
                                    ve taahhüt eder.</p>
                                <p><b>5.14.</b> Alıcı ile sipariş esnasında kullanılan kredi kartı hamilinin aynı kişi
                                    olmaması veya Ürün/Hizmet’in Alıcı’ya tesliminden evvel, siparişte kullanılan kredi
                                    kartına ilişkin güvenlik açığı tespit edilmesi halinde, kredi kartı hamiline ilişkin
                                    kimlik ve iletişim bilgilerini, siparişte kullanılan kredi kartının bir önceki aya ait
                                    ekstresini yahut kart hamilinin Banka’dan kredi kartının kendisine ait olduğuna ilişkin
                                    yazıyı ibraz etmesini Alıcı’dan talep edilebilecektir. Alıcı’nın talebe konu
                                    bilgi/belgeleri temin etmesine kadar geçecek sürede sipariş dondurulacak olup, söz
                                    konusu taleplerin 24 (yirmidört) saat içerisinde karşılanmaması halinde ise Satıcı,
                                    siparişi iptal etme hakkını haizdir.</p>
                                <p><b>5.15.</b> Alıcı Sözleşme konusu bedeli Trendyol Cüzdan aracılığıyla ödemesi ve bu
                                    siparişe ilişkin cayma hakkını kullanması halinde cayma hakkından kaynaklı bedel iadesi
                                    Trendyol Cüzdan’a tek seferde yapılabilecektir.</p>
                                <p><b>5.16.</b> Sipariş edilmeyen Ürün/Hizmet’in gönderilmesi durumunda, Alıcı’ya karşı
                                    herhangi bir hak ileri sürülemez. Bu hallerde, Alıcı’nın sessiz kalması ya da söz konusu
                                    Ürün/Hizmet’i kullanmış olması, sözleşmenin kurulmasına yönelik kabul beyanı olarak
                                    yorumlanamaz.</p>
                                <p><b>5.17.</b> Alıcı’nın sipariş edebileceği Ürün/Hizmet adetlerine Platform’dan yapılacak
                                    duyurularla kısıt getirilebilir. Alıcı’nın Platform’dan yapılan duyurularda belirtilen
                                    adedin üzerinde Ürün/Hizmet sipariş etmek istemesi halinde sipariş vermesi
                                    engellenebilecek, siparişi verdikten sonra belirtilen adedin üstünde sipariş verdiğinin
                                    tespit edilmesi halinde ise belirtilen adedin üstündeki siparişleri iptal edilebilecek
                                    ve bu halde varsa iptal edilen siparişlere ilişkin teslimat masrafları da dâhil olmak
                                    üzere tahsil edilen tüm ödemeler yasal süresi içerisinde Alıcı’ya iade edilecektir.
                                    Alıcı işbu hususları kabul ederek siparişini oluşturduğunu, adet sınırlamasını geçen
                                    siparişlerinin engellenebileceği ve iptal edilebileceğini kabul, beyan ve taahhüt eder.
                                </p>
                                <p><b>5.18.</b> Satıcı’nın herhangi bir sebeple tedarik edemediği siparişler, Alıcı’nın
                                    onayının alınması halinde, mevzuattaki yasal teslim süresini aşmamak ve Alıcı’nın
                                    Ürün/Hizmet ile aynı özellikleri haiz olmak kaydıyla, bir başka satıcıya
                                    aktarılabilecektir. Böyle bir durumda Ürün/Hizmet yeni satıcı tarafından Alıcı’ya
                                    gönderilecek olup Sözleşme yeni satıcı ile Alıcı arasında kurulmuş olacaktır. Bu halde,
                                    Alıcı’ya herhangi bir ek bedel, ücret ve/veya masraf yansıtılmayacaktır.</p>
                                <p><b>5.19.</b> Alıcı tüketici sıfatıyla talep, şikayet ve önerilerini yukarıda yer alan
                                    Satıcı iletişim bilgilerini kullanmak suretiyle ve/veya Platform’un sağladığı kanallarla
                                    (0 212 331 0 200 telefon numarası üzerinden ve “Trendyol Asistan’a Sor” başlıklı
                                    alandan) ulaştırabilecektir.</p>
                                <h3 class="pre-contract-h3">6. <span>ÖZEL ŞARTLAR</span></h3>
                                <p><b>6.1.</b> Alıcı, aksi belirtilmedikçe, Platform’da birden fazla butikten tek bir
                                    sepette alışveriş yapabilecektir. Aynı sepet içerisinde farklı butikten alınan her bir
                                    Ürün/Hizmet için Satıcı tarafından birden fazla fatura kesilebilecektir. Şüpheye mahal
                                    bırakmamak bakımından belirtilmelidir ki, Satıcı, Alıcı’nın farklı butiklerden aldığı
                                    Ürün/Hizmet’in teslimatını mevzuattaki yasal süre içerisinde kalmak koşuluyla farklı
                                    zamanlarda gerçekleştirebilecektir.</p>
                                <p><b>6.2.</b> Alıcı’nın vereceği siparişlerde kurumsal fatura seçeneğini seçmesi durumunda
                                    Satıcı, Alıcı tarafından Platform üzerinden bildirilecek vergi kimlik numarası ve vergi
                                    dairesi bilgilerini kullanarak kurumsal fatura düzenleyecektir. Faturada yer alması
                                    gereken bilgilerin doğru, güncel ve eksiksiz girilmesi tamamen Alıcı’nın sorumluluğunda
                                    olup, bu sebeple doğabilecek tüm zararlardan bizzat Alıcı sorumludur.</p>
                                <p><b>6.3.</b> Platform üzerinden kredi kart ile ödeme yapılması halinde, Banka tarafından
                                    kampanyalar düzenlenerek Alıcı tarafından seçilen taksit adedinin daha üstünde bir
                                    taksit adedi uygulanabilecek veya taksit erteleme gibi ek hizmetler sunulabilecektir. Bu
                                    tür kampanyalar Banka’nın inisiyatifindedir. Alıcı’nın kredi kartının hesap kesim
                                    tarihinden itibaren sipariş toplamı taksit adedine bölünerek kredi kartı özetine Banka
                                    tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat farklarını dikkate alarak
                                    aylara eşit olarak dağıtmayabilir. Detaylı ödeme planlarının oluşturulması Banka’nın
                                    inisiyatifindedir.</p>
                                <p><b>6.4.</b> Dijital ürünler fiziki gönderime uygun olmayıp, teslimat ürün niteliğine göre
                                    şartlarında belirtilen şekilde gerçekleştirilecektir. Sözleşme’nin yer alıp da teslimat
                                    şekilleri vb. gibi fiziki ürünler için geçerli olan düzenlemeler dijital ürünlere
                                    uygulanmayacak olup bu maddelerdeki düzenlemeler uygulanabilir olduğu ölçüde ürün
                                    şartlarında belirtilen koşul ve açıklamalara uygun olacak şeklinde yorumlanmalıdır.</p>
                                <p><b>6.5.</b>Sipariş verilen Ürün’ün elektrikli motosiklet olması halinde kurulumu
                                    gerçekleştikten veya tescil işlemi yapılıp ruhsatlandıktan sonra Platform üzerinden
                                    iadesi mümkün olmamaktadır.</p>
                                <p><b>6.6.</b> Platformda satışa sunulan Ürün/Hizmetler yalnızca Satıcı tarafından
                                    belirlenen sınırlı lokasyonlara (il/ilçe/bölge) teslim edilmek üzere satışa
                                    sunulabilecek olup, sipariş sürecinde Alıcı'nın bu ürün/hizmetler için teslimat adresini
                                    Satıcı tarafından belirlenmiş olan lokasyonlardan biri dışında seçmesi halinde ilgili
                                    sipariş verilemeyecek/satın alım gerçekleşmeyecektir.</p>
                                <p><b>6.7.</b>Türkiye Cumhuriyeti resmi kamu kurum ve kuruluşları ile koordineli yürütülen
                                    "Depreme Yardım Seferberliği" ve benzeri seferberlik ve yardım işlemleriyle bağlantılı
                                    siparişlerde (ö: koli yardımı, vb.), Mesafeli Sözleşmeler Yönetmeliği’nin 15/1-h maddesi
                                    gereği cayma hakkı kullanılamayacaktır.</p>
                                <h3 class="pre-contract-h3">7.
                                    <span>KİŞİSEL VERİLERİN KORUNMASI VE FİKRİ-SINAİ HAKLAR</span></h3>
                                <p><b>7.1.</b> Satıcı, işbu sözleşme kapsamındaki kişisel verileri sadece Ürün/Hizmet’in
                                    sunulması amacıyla sınırlı olarak ve 6698 sayılı Kişisel Verilerin Korunması Kanunu’na,
                                    (“KVKK”) ikincil mevzuata ve Kişisel Verileri Koruma Kurulu kararlarına uygun olarak
                                    işleyecektir. Satıcı, Platform üzerinden eriştiği kişisel veriler haricinde Alıcı’nın
                                    kişisel verilerini işlemeyeceğini ve Platform üzerinden sağlanan yöntemler dışında Alıcı
                                    ile harici olarak iletişime geçmeyeceğini kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.2.</b> Alıcı, işbu Sözleşme kapsamında sağladığı kişisel verilerin doğru, eksiksiz
                                    ve güncel olduğunu kontrol etmekle, bu bilgileri üçüncü kişilerle paylaşmamak, ilgisiz
                                    kişilerce erişilememesi için virüs ve benzeri zararlı uygulamalara ilişkin olanlar dahil
                                    gerekli tedbirleri almak ve söz konusu kişisel verilerin güvenliğini sağlamakla yükümlü
                                    olduğunu, aksi halde doğacak zararlardan ve üçüncü kişilerden gelen taleplerden bizzat
                                    sorumlu olduğunu kabul, beyan ve taahhüt eder.</p>
                                <p><b>7.3.</b> Platform’a ait her türlü bilgi ve içerik ile bunların düzenlenmesi, revizyonu
                                    ve kısmen/tamamen kullanımı konusunda; Satıcı'nın anlaşmasına göre diğer üçüncü
                                    şahıslara ait olanlar hariç; tüm fikri-sınai haklar ve mülkiyet hakları DSM’ye aittir.
                                </p>
                                <h3 class="pre-contract-h3">8. <span>CAYMA HAKKI</span></h3>
                                <p><b>8.1.</b> Alıcı, 15 (onbeş) gün içinde herhangi bir gerekçe göstermeksizin ve cezai
                                    şart ödemeksizin Sözleşme’den cayma hakkına sahiptir.</p>
                                <p><b>8.2.</b> Cayma hakkı süresi, Hizmet için Sözleşme’nin kurulduğu gün; Ürün için
                                    Alıcı’nın veya Alıcı tarafından belirlenen üçüncü kişinin Ürün’ü teslim aldığı gün
                                    başlar. Ancak Alıcı, Sözleşme’nin kurulmasından Ürün teslimine kadar olan süre içinde de
                                    cayma hakkını kullanabilir.</p>
                                <p><b>8.3.</b> Cayma hakkı süresinin belirlenmesinde;</p>
                                <p><b>a)</b> Tek sipariş konusu olup ayrı ayrı teslim edilen Ürün’de, Alıcı veya Alıcı
                                    tarafından belirlenen üçüncü kişinin son Ürün’ü teslim aldığı gün,</p>
                                <p><b>b)</b> Birden fazla parçadan oluşan Ürün’de, Alıcı veya Alıcı tarafından belirlenen
                                    üçüncü kişinin son parçayı teslim aldığı gün,</p>
                                <p><b>c)</b> Belirli bir süre boyunca Ürün’ün düzenli tesliminin yapıldığı durumlarda, Alıcı
                                    veya Alıcı tarafından belirlenen üçüncü kişinin ilk Ürün’ü teslim aldığı gün</p>
                                <p>esas alınır.</p>
                                <p><b>8.4.</b> Ürün teslimi ile Hizmet ifasının birlikte olduğu durumlarda, Ürün teslimine
                                    ilişkin cayma hakkı hükümleri uygulanır.</p>
                                <p><b>8.5.</b> Satıcı;</p>
                                <p><b>a)</b> Ürün'ün teslimi veya Hizmet’in ifasından önce Alıcı’nın cayma hakkını
                                    kullanması durumunda cayma hakkının kullanıldığına ilişkin bildirimin kendisine ulaştığı
                                    tarihten itibaren,</p>
                                <p><b>b)</b> Ürün’ün tesliminden sonra Alıcı’nın cayma hakkını kullanması durumunda, cayma
                                    bildiriminin kendisine ulaştığı tarih itibarıyla bedel Satıcı’ya aktarılmamışsa cayma
                                    hakkına konu Ürün’ün, iade için öngörülen Kargo Şirketi’ne teslim edildiği tarihten veya
                                    iade için öngörülenin haricinde bir Kargo Şirketi ile iade edilmesi durumunda da
                                    Satıcı’ya ulaştığı tarihten itibaren,</p>
                                <p><b>c)</b> Alıcı’nın siparişinin yasal süre içerisinde teslim edilememesi nedeniyle
                                    Sözleşme’yi fesih hakkını kullanması durumunda fesih bildiriminin kendisine ulaştığı
                                    tarihten itibaren</p>
                                <p>15 (onbeş) gün içinde, tahsil ettiği Sözleşme konusu bedeli ile teslimat masraflarının
                                    Alıcı’ya iadesinden sorumludur.</p>
                                <p><b>8.6.</b> Cayma hakkı bildiriminin ve Sözleşme’ye ilişkin diğer bildirimlerin mevzuata
                                    uygun ve süresi içerisinde Platform’da belirtilen DSM’ye ve/veya Satıcı’ya ait iletişim
                                    kanallarından yapılması şarttır. Cayma bildiriminin yapılacağı iletişim kanallarına
                                    https://www.trendyol.com/iletisim.html linkinden ulaşılabilmektedir.</p>
                                <p><b>8.7.</b> Cayma hakkının kullanılması halinde:</p>
                                <p><b>a)</b> Alıcı cayma hakkını kullanmasından itibaren 14 (ondört) gün içerisinde Ürün’ü
                                    Satıcı'ya Kargo Şirketi’yle geri gönderir.</p>
                                <p><b>b)</b> Cayma hakkı kapsamında iade edilecek Ürün kutusu, ambalajı, varsa standart
                                    aksesuarları ve varsa Ürün ile birlikte hediye edilen diğer Ürünler’in de eksiksiz ve
                                    hasarsız olarak iade edilmesi gerekmektedir.</p>
                                <p><b>8.8.</b> Alıcı cayma süresi içinde Ürün’ü, işleyişine, teknik özelliklerine ve
                                    kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana gelen değişiklik ve
                                    bozulmalardan sorumlu değildir.</p>
                                <p><b>8.9.</b> Cayma hakkının kullanılmasını takip eden 14 (ondört) gün içerisinde Sözleşme
                                    konusu bedeller Alıcı’ya Alıcı’nın ödeme yöntemi ile iade edilmektedir. Ürün/Hizmet,
                                    Satıcı'ya iade edilirken, Ürün/Hizmet’in teslimi sırasında Alıcı’ya ibraz edilmiş olan
                                    orijinal faturanın da Alıcı tarafından iade edilmesi gerekmektedir. Alıcı’nın kurumsal
                                    fatura istemesi halinde ilgili Ürün/Hizmet iadesi için iade faturası kesmesi veya
                                    mümkünse süresi içerisinde ticari faturayı kendi sistemlerinden reddetmesi
                                    gerekmektedir.</p>
                                <p><b>8.10.</b> Alıcı iade edeceği Ürün/Hizmet’i Ön Bilgilendirme Formu’nda belirtilen
                                    Satıcı'nın Kargo Şirketi ile Satıcı'ya gönderdiği sürece iade kargo bedeli Satıcı'ya
                                    aittir. İade için Alıcı’nın bulunduğu yerde Satıcı’nın Kargo Şirketi şubesi bulunmaması
                                    halinde, Alıcı Ürün’ü herhangi bir Kargo Şirketi’yle gönderebilecektir. Bu halde iade
                                    kargo bedeli ve Ürün’ün kargo sürecinde uğrayacağı hasardan Satıcı sorumludur.</p>
                                <p><b>8.11.</b> Alıcı cayma hakkını işbu maddede belirtilen süre ve usuller dahilinde
                                    kullanacak olup aksi halde cayma hakkını kaybedecektir.</p>
                                <h3 class="pre-contract-h3">9. <span>CAYMA HAKKININ KULLANILAMAYACAĞI HALLER</span></h3>
                                <p><b>9.1.</b> Alıcı aşağıdaki sözleşmelerde cayma hakkını kullanamaz:</p>
                                <p><b>a) </b>Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı
                                    veya DSM’nin kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler,</p>
                                <p><b>b) </b>Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                    ilişkin sözleşmeler,</p>
                                <p><b>c) </b>Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine
                                    ilişkin sözleşmeler,</p>
                                <p><b>d)</b> Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                    olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin
                                    sözleşmeler,</p>
                                <p><b>e) </b>Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması
                                    mümkün olmayan mallara ilişkin sözleşmeler,</p>
                                <p><b>f)</b>Ürünün tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları
                                    açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf
                                    malzemelerine ilişkin sözleşmeler,</p>
                                <p><b>g)</b>Abonelik sözleşmesi kapsamında sağlananlar dışında gazete ve dergi gibi süreli
                                    yayınların teslimine ilişkin sözleşmeler,</p>
                                <p><b>h)</b>Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma,
                                    araba kiralama, yiyecek içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş
                                    zamanın değerlendirilmesine ilişkin sözleşmeler,</p>
                                <p><b>i)</b> Elektronik ortamda anında ifa edilen hizmetler ile Alıcı’ya anında teslim
                                    edilen gayri maddi mallara ilişkin sözleşmeler,</p>
                                <p><b>j)</b> Cayma hakkı süresi sona ermeden önce, Alıcı’nın onayı ile ifasına başlanan
                                    hizmetlere ilişkin sözleşmeler,</p>
                                <p>cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.2.</b> Ürün/Hizmet’in Yönetmelik'in uygulama alanı dışında bırakılmış olan <i>(Sözleşme’nin
                                        3.3. maddesinde listelenmiştir)</i> Ürün/Hizmet türlerinden müteşekkil olması halinde
                                    Alıcı ve Satıcı arasındaki hukuki ilişkiye Yönetmelik hükümleri uygulanamaması sebebiyle
                                    cayma hakkı kullanılamayacak; bu siparişler bakımından Platform üzerinden iade kodu da
                                    oluşturulamayacaktır.</p>
                                <p><b>9.3.</b> Platform üzerinden elektronik kod satın alındığı durumlarda bahse konu
                                    siparişlerde Yönetmelik gereği cayma hakkı söz konusu olmayacaktır. Bu siparişler
                                    bakımından Platform üzerinden iade kodu da oluşturulamayacaktır.</p>
                                <h3 class="pre-contract-h3">10. <span>UYUŞMAZLIKLARIN ÇÖZÜMÜ</span></h3>
                                <p><b>10.1</b>Sözleşme’nin uygulanmasında, Bakanlık’ça ilan edilen değerlere uygun olarak
                                    Alıcı’nın Ürün/Hizmet’i satın aldığı ve ikametgahının bulunduğu yerdeki Tüketici Hakem
                                    Heyetleri ile Tüketici Mahkemeleri yetkilidir.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-orange text-white w-100 btn-contracts-approve">Onaylıyorum</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push("js")
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endpush
