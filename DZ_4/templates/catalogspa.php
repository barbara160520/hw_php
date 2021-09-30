
<h2>Каталог</h2>
<div id="text"></div>

<script>

    (async () => {
        const response = await fetch('/apicatalog/');

        //получаем ответ и парсим его в answer в виде объекта
        const answer = await response.json();

        //По полученным данным рендерим блок каталога и вставляем его в DOM
        document.getElementById('text').innerHTML = render(answer.catalog);
    })().catch(e =>
        document.getElementById('text').innerHTML =
            "<span style='color:red'>Ошибка получения данных!<br>" + e + "</span>"
    );



    //Функция рендера каталога
    function render(catalog) {
        let html = "";
    html += "<div class='catalog'><ul class='catalog-menu'>";
        for (item in catalog) {
            html += "<li class='catalog-list'><p class='text'>" + catalog[item].name + "<span class='price'>";
            html += "Цена: " + catalog[item].price + "$</span></p>";
            html += "<img src='/img/" + catalog[item].image +"'>";
            html += "<button class='buy'>Купить</button></li>";
        }
    html += "</ul></div>";
        return html;
    }

</script>
