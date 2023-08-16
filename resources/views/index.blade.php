@include('layouts.header')

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="{{asset('front/img/logo.png')}}" alt="" width="150" height="75">
    <h1 class="display-5 fw-bold text-body-emphasis">Nuitex Otele Hoşgeldiniz Rezervasyon Yapmak İçin Giriş Yapın ya da Üye Olun</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Uzunnu Şirketler Grubu bünyesinde faaliyete geçen Nuitex Bilişim Teknolojileri Sanayi Ticaret A.Ş Otel 2023 Yılında Kurulmuştur</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <script language="JavaScript1.2">


            var message="Bu sitenin tüm kodları Mehmet Can Özcan tarafından yazılmıştır"
            var neonbasecolor="gray"
            var neontextcolor="red"
            var flashspeed=100



            var n=0
            if (document.all||document.getElementById){
            document.write('')
            for (m=0;m<message.length;m++)
            document.write('<span id="neonlight'+m+'">'+message.charAt(m)+'</span>')
            document.write('')
            }
            else
            document.write(message)

            function crossref(number){
            var crossobj=document.all? eval("document.all.neonlight"+number) : document.getElementById("neonlight"+number)
            return crossobj
            }

            function neon(){


            if (n==0){
            for (m=0;m<message.length;m++)

            crossref(m).style.color=neonbasecolor
            }


            crossref(n).style.color=neontextcolor

            if (n<message.length-1)
            n++
            else{
            n=0
            clearInterval(flashing)
            setTimeout("beginneon()",1500)
            return
            }
            }

            function beginneon(){
            if (document.all||document.getElementById)
            flashing=setInterval("neon()",flashspeed)
            }
            beginneon()


            </script>
      </div>
    </div>
  </div>

@include('layouts.footer')
