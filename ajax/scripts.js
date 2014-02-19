function loadXMLDoc(url)
			{
				var xmlhttp;
				var element;
				var txt,foodItem, quantity, unit,i,titulo,print,foto,tagimg,preparacion, prep, equip, servir;
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else {// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()	{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)	{

						element = xmlhttp.responseXML.documentElement;
						
						titulo = element.getElementsByTagName('title');
						document.getElementById('titulo').innerHTML = '<h1>'+titulo[0].firstChild.nodeValue+'</h1>';

						tagimg = document.createElement('img');
						foto = element.getElementsByTagName('img');
						tagimg.src = foto[0].firstChild.nodeValue;
						document.getElementById('img').appendChild(tagimg);

						txt="<h2>Ingredients</h2>";
						txt = txt + "<ul>";
						foodItem = element.getElementsByTagName("fooditem");
						for (i=0 ; i < foodItem.length; i++) {
							txt = txt + '<li>' + foodItem[i].firstChild.nodeValue +'</li>';
						}
						txt = txt + "</ul>";
						document.getElementById('info').innerHTML=txt;
						
						preparacion = element.getElementsByTagName('preparation');
						equip = element.getElementsByTagName('equipment');
						for (i = 0; i < preparacion.length ; i++) {
							prep = preparacion[i].firstChild.nodeValue+" "+equip[i].firstChild.nodeValue + " " + preparacion[i].lastChild.nodeValue;
						};
						document.getElementById('preparacion').innerHTML = '<h2>Preparation</h2>'+prep;

						servir = element.getElementsByTagName('serving');

						document.getElementById('servir').innerHTML = '<h2>Serving</h2>'+servir[0].firstChild.nodeValue;

					} else {
						document.getElementById('info').innerhtml = '<img src="http://ajaxload.info/cache/FF/FF/FF/00/00/00/30-1.gif" />';
					}
				}
				xmlhttp.open("GET",url,true);
				xmlhttp.send();

				img = document.getElementById('img');
				img.removeChild(img.firstChild);
			}