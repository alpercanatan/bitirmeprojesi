$(function() {
	var menu = {
		"Ana Sayfa": {
			sayfa: "genelbilgi.php",
			nav: [{ id: "Ana Sayfa" }]
		},
		"Kullanıcılar": {
			sayfa: "kullanicilar.php",
			nav: [{ id: "Kullanıcılar" }]
		},
		"FİRMALAR": {
			sayfa: "firmalar.php",
			nav: [{ id: "FİRMALAR" }]
		},
		"TEKLİFLER": {
			sayfa: "teklifler.php",
			nav: [{ id: "TEKLİFLER" }]
		},
		"ÜRÜNLER": {
			sayfa: "urunler.php",
			nav: [{ id: "ÜRÜNLER" }]
		}

	};
	$(".list-group-item").on("click", function() {
		var current = $(this).siblings(".active");
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var sayfa_adi = $(this).text();
		if(!menu[sayfa_adi]) {
			alert("Bu sayfa henüz hazır değil.");
			$(this).siblings().removeClass("active");
			current.addClass("active");
			$(this).removeClass("active");
			return false;
		}
		$.get("php/" + menu[sayfa_adi].sayfa, function(data) {
			$("#main").html(data);
            $('input#Tarih').datepicker({
                format: "yyyy-mm-dd",
                language: "tr"
            });
		});
		$(".breadcrumb").html("");
		$.each(menu[sayfa_adi].nav, function(index, item) {
			if(item.url) {
				$(".breadcrumb").append("<li><a href='" + item.url + "'>" + item.id + "</a></li>");
			} else {
				$(".breadcrumb").append("<li>" + item.id + "</li>");
			}
		});
		$(".breadcrumb > li:last-child").addClass("active");
	});

	$(".list-group-item:first-child").click();
});

$.fn.datepicker.dates['tr'] = {
    days: ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar"],
    daysShort: ["Pz", "Pzt", "Sal", "Çrş", "Prş", "Cu", "Cts", "Pz"],
    daysMin: ["Pz", "Pzt", "Sa", "Çr", "Pr", "Cu", "Ct", "Pz"],
    months: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
    monthsShort: ["Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara"],
    today: "Bugün",
    format: "dd.mm.yyyy"
};

function teklifonayla(id) {
var degisken=confirm("Teklif Onaylansın Mı?")
if (degisken==true)
{
    ajaxRequest("php/teklifduzenle.php?i=" + id , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function teklifsil(teklifid) {
var degisken=confirm("Teklif Silinsin Mi?")
if (degisken==true)
{
       ajaxRequest("php/teklifsil.php?i=" + teklifid , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function kullaniciduzenle(editid,editkullanici,editsifre,edittur) {
var degisken=confirm("Kullanıcı Düzenlensin Mi?")
if (degisken==true)
{

       ajaxRequest("php/kullaniduzenle.php?k="   +"&s="  +"&t="+"&i=" , function(xmlhttp)
    {

    	$(".list-group-item.active").click();
    });
}
}

function kullanicisil(delkullanici) {
var degisken=confirm("Kullanıcı Silinsin Mi?")
if (degisken==true)
{
       ajaxRequest("php/kullanicisil.php?k=" + delkullanici , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function kullanicikaydet() {
var degisken=confirm("Kullanıcı Kayıt Edilsin Mi?")
var kullanici = document.getElementById("kullanici").value;
var sifre = document.getElementById("sifre").value;
var tur = document.getElementById("tur").value;
if (degisken==true)
{
	  if (kullanici != "" && sifre!="" && tur!="")
    {
      	 ajaxRequest("php/kullaniciekle.php?k=" +kullanici + "&s="+sifre + "&t=" + tur  , function(xmlhttp)
    	{
    		 if(xmlhttp.responseText == "NO")
    		 {
    		 	alert("Kullanıcı Var");
    		 }
    		 
    	$(".list-group-item.active").click();
   		 });
    }
}
}


function firmaduzenle(editid,editfirmaadi,editfirmatel,editfirmaadres,editfirmayetkili) {
var degisken=confirm("Firma Düzenlensin Mi?")
if (degisken==true)
{
       ajaxRequest("php/firmaduzenle.php?fadi=" +  "&ftel="  +"&fadr="+"&fyet="+ "&i=" , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function firmasil(firmaid) {
var degisken=confirm("Firma Silinsin Mi?")
if (degisken==true)
{
       ajaxRequest("php/firmasil.php?i=" + firmaid , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function firmakaydet() {
var degisken=confirm("Firma Kayıt Edilsin Mi?")
var firmaadi = document.getElementById("firmaadi").value;
var firmatel = document.getElementById("firmatel").value;
var firmaadres = document.getElementById("firmaadres").value;
var firmayetkili = document.getElementById("firmayetkili").value;
if (degisken==true)
{
	  if (firmaadi != "" && firmatel!="" && firmaadres!="" && firmayetkili!="")
    {
      	 ajaxRequest("php/firmaekle.php?fadi=" +firmaadi + "&ftel="+firmatel + "&fadr=" + firmaadres + "&fyet=" + firmayetkili , function(xmlhttp)
    	{
    	$(".list-group-item.active").click();
   		 });
    }
}
}


function urunduzenle(editid,editukod,editbfiy,edittar,edituadi) {
var degisken=confirm("Ürüm Düzenlensin Mi?")
if (degisken==true)
{
       ajaxRequest("php/urunduzenle.php?ukod="   +"&bfiy=" +"&tar="+"&uadi="+ "&i=" , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function urunsil(urunid) {
var degisken=confirm("Ürün Silinsin Mi?")
if (degisken==true)
{
       ajaxRequest("php/urunsil.php?i=" + urunid , function(xmlhttp)
    {
    	$(".list-group-item.active").click();
    });
}
}

function urunkaydet() {
var degisken=confirm("Urun Kayıt Edilsin Mi?")
var UrunKod = document.getElementById("UrunKod").value;
var BirimFiyat = document.getElementById("BirimFiyat").value;
var Tarih = document.getElementById("Tarih").value;
var UrunAdi = document.getElementById("UrunAdi").value;
if (degisken==true)
{
	  if (UrunKod != "" && BirimFiyat!="" && Tarih!="" && UrunAdi!="")
    {
      	 ajaxRequest("php/urunekle.php?ukod=" +UrunKod + "&bfiy="+BirimFiyat + "&tar=" + Tarih + "&uadi=" + UrunAdi , function(xmlhttp)
    	{
    	$(".list-group-item.active").click();
   		 });
    }
}
}


function ajaxRequest(file, succesFunction, failFunction)
{
    var xmlhttp;

    if (window.XMLHttpRequest)
    {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4)
        {
            if(xmlhttp.status == 200)
            {
                if(succesFunction)
                {
                    succesFunction(xmlhttp);
                }
            }
            else if(xmlhttp.status == 404)
            {
                if(failFunction)
                {
                    failFunction();
                }
            }
        }
    }

    xmlhttp.open("GET", file, true);
    xmlhttp.send();
}