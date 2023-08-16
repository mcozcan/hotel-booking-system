@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')

<center>
    <h1>Rezervasyon Sorgulama</h1>
    <form id="query-form">
        <label for="reservation-number">Rezervasyon Numarası:</label>
        <input type="text" id="reservation-number" name="reservation_number" required>
        <button type="button" id="query-button">Sorgula</button>
    </form>
    <div id="result-container"></div>

    <script>
        const queryButton = document.getElementById('query-button');
        const resultContainer = document.getElementById('result-container');

        queryButton.addEventListener('click', async () => {
            const reservationNumber = document.getElementById('reservation-number').value;

            try {
                const response = await fetch(`/rezervasyon-sorgula-ajax?reservation_number=${reservationNumber}`);
                const data = await response.json();

                if (response.ok) {
                    if (data) {

                        resultContainer.innerHTML = `
                            <p>Rezervasyon Numarası: ${data.rez_kod}</p>
                            <p>Giriş Tarihi: ${data.giris}</p>
                            <p>Çıkış Tarihi: ${data.cikis}</p>
                            <p>Müşteri Adı: ${data.musteri_adi}</p>
                            <p>Müşteri ID: ${data.musteri_id}</p>
                            <p>Total Fiyat: ${data.total_fiyat}</p>
                            <p>Oda ID: ${data.oda_id}</p>
                            <p>Kişi Sayısı: ${data.kisi_sayisi}</p>

                        `;
                    } else {
                        resultContainer.innerHTML = '<p>Rezervasyon bulunamadı.</p>';
                    }
                } else {
                    resultContainer.innerHTML = '<p>Bir hata oluştu.</p>';
                }
            } catch (error) {
                resultContainer.innerHTML = '<p>Bir hata oluştu.</p>';
            }
        });

    </script>

</center>



@include('layouts.footer')
@endif
