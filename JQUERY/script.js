const API_URL = 'http://api.openweathermap.org/data/2.5/weather?q=tashkent&appid=cda65707acd1bb69e81909ae9de1eccb';
const API_URLdas = 'http://api.openweathermap.org/data/2.5/forecast?q=tashkent&appid=1e8450cf3734dde7e3e1f93640e52fae';
const btn1 = document.querySelector('.todaybtn');
const btn2 = document.querySelector('.fivebtn');
const now = new Date();
const wearher = document.getElementById('weather');
// setweather()
// getWeather3(API_URLdas);
// getWeather(API_URL);
btn1.addEventListener('click', (e) => {
    setweather();
    getWeather3(API_URLdas);
    getWeather(API_URL);
})

btn2.addEventListener('click', function () {
    getWeather2(API_URLdas);

})
async function getWeather2(url) {
        const res = await fetch(url);
        const data = await res.json();console.log(data);
        set5days(data)

    }
async function getWeather(url) {
    const res = await fetch(url);
    const data = await res.json(); console.log(data);
    insertCurrentWeather(data)
}

async function getWeather3(url) {
    const res = await fetch(url);
    const data = await res.json();
    insertCurrentWeathertable(data)
}
function set5days(data) {
    wearher.innerHTML = `
    <div class="five_block">
        <div class="block" onclick="day1(${data})">
            <div class="week">${data.list[0].dt_txt}</div>
            <div class="icon"><img src="http://openweathermap.org/img/w/${data.list[0].weather[0].icon}.png"></div>
            <div class="temp">${Math.floor(data.list[0].main.temp - 273)}</div>
            <div class="weath">${data.list[0].weather[0].description}</div>
        </div>
        <div class="block" onclick="">
            <div class="week">${data.list[8].dt_txt}</div>
            <div class="icon"><img src="http://openweathermap.org/img/w/${data.list[8].weather[0].icon}.png"></div>
            <div class="temp">${Math.floor(data.list[8].main.temp - 273)}</div>
            <div class="weath">${data.list[8].weather[0].description}</div>
        </div>
        <div class="block" onclick="">
            <div class="week">${data.list[16].dt_txt}</div>
            <div class="icon"><img src="http://openweathermap.org/img/w/${data.list[16].weather[0].icon}.png"></div>
            <div class="temp">${Math.floor(data.list[16].main.temp - 273)}</div>
            <div class="weath">${data.list[16].weather[0].description}</div>
        </div>
        <div class="block" onclick="">
            <div class="week">${data.list[24].dt_txt}</div>
            <div class="icon"><img src="http://openweathermap.org/img/w/${data.list[24].weather[0].icon}.png"></div>
            <div class="temp">${Math.floor(data.list[24].main.temp - 273)}</div>
            <div class="weath">${data.list[24].weather[0].description}</div>
        </div>
        <div class="block" onclick="">
            <div class="week">${data.list[32].dt_txt}</div>
            <div class="icon"><img src="http://openweathermap.org/img/w/${data.list[32].weather[0].icon}.png"></div>
            <div class="temp">${Math.floor(data.list[32].main.temp - 273)}</div>
            <div class="weath">${data.list[32].weather[0].description}</div>
        </div>
    </div>
    <div id="hourlyfive"></div>
    `
    
}
function day1(data) {//ошибка которую я не могу решить
    let hourlyfive = document.getElementById('hourlyfive');
    hourlyfive.innerHTML=`
    <table>
                    <tr>
                        <th>Today</th>
                        <th>${data.list[0+24].dt_txt}</th>
                        <th>${data.list[1].dt_txt}</th>
                        <th>${data.list[2].dt_txt}</th>
                        <th>${data.list[3].dt_txt}</th>
                        <th>${data.list[4].dt_txt}</th>
                        <th>${data.list[5].dt_txt}</th>
                    </tr>
                    <tr>
                        <th>&shy;</th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[0].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[1].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[2].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[3].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[4].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[5].weather[0].icon}.png"></th>
                    </tr>
                    <tr>
                        <th>Forecast</th>
                        <th>${data.list[0].weather[0].description}</th>
                        <th>${data.list[1].weather[0].description}</th>
                        <th>${data.list[2].weather[0].description}</th>
                        <th>${data.list[3].weather[0].description}</th>
                        <th>${data.list[4].weather[0].description}</th>
                        <th>${data.list[5].weather[0].description}</th>
                    </tr>
                    <tr>
                        <th>Temp(*C)</th>
                        <th>${Math.floor(data.list[0].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[1].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[2].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[3].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[4].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[5].main.temp - 273)}&deg;</th>
                    </tr>
                    <tr>
                        <th>RealFeel</th>
                        <th>${Math.floor(data.list[0].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[1].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[2].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[3].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[4].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[5].main.feels_like - 273)}&deg;</th>
                    </tr>
                    <tr>
                        <th>Wind (km/h)</th>
                        <th>${data.list[0].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[1].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[2].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[3].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[4].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[5].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                    </tr>
                </table>
    `
}
function setweather() {
    wearher.innerHTML = `
    <div id="current_weather">
                
            </div>
            <div id="hourly">
                
            </div>
            <div class="nearby_places">
                <h3>NEARBY PLACES</h3>
                <div class="nearby_items">
                    <div class="nearby_item">
                        <div>Baladzahari</div>
                        <div><img class="narby_img"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Sun.svg/1024px-Sun.svg.png">
                        </div>
                        <div>36 &deg;C</div>
                    </div>
                    <div class="nearby_item">
                        <div>Baladzahari</div>
                        <div><img class="narby_img"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Sun.svg/1024px-Sun.svg.png">
                        </div>
                        <div>36 &deg;C</div>
                    </div>
                    <div class="nearby_item">
                        <div>Baladzahari</div>
                        <div><img class="narby_img"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Sun.svg/1024px-Sun.svg.png">
                        </div>
                        <div>36 &deg;C</div>
                    </div>
                    <div class="nearby_item">
                        <div>Baladzahari</div>
                        <div><img class="narby_img"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Sun.svg/1024px-Sun.svg.png">
                        </div>
                        <div>36 &deg;C</div>
                    </div>
                </div>
            </div>`
}
function insertCurrentWeather(data) {
    const { name, main, wind, weather, sys } = data
    const today = document.getElementById('current_weather');

    let now = new Date().getTime()
    today.innerHTML = `
    <h3>CURRENT WEATHER</h3>
                <div class="current_date">30.06.2018</div>
                <div class="current_main">
                    <div class="current_img"><img src="http://openweathermap.org/img/w/${weather[0].icon}.png">
                    </div>
                    <div class="current_degrees">
                        <div class="temperature">${Math.floor(main.temp - 273)}&deg;C</div><br>
                        <div class="current_realFeel">
                            Real Feel ${Math.floor(main.feels_like - 273)}&deg;C
                        </div>
                    </div>
                    <div class="current_inform">
                        Sunrise: ${getHours(sys.sunrise)} pm <br>
                        Sunset: ${getHours(sys.sunset)} am<br>
                        Duration: ${getHours(sys.sunset - sys.sunrise).getHours()}:${getHours(sys.sunset - sys.sunrise).getMinutes()}:${getHours(sys.sunset - sys.sunrise).getSeconds()} hours
                    </div>
                </div>
    `;
}
function insertCurrentWeathertable(data) {
    const today2 = document.getElementById('hourly');

    today2.innerHTML = `
    <h3>HOURLY</h3>
    <table>
                    <tr>
                        <th>Today</th>
                        <th>${data.list[0].dt_txt}</th>
                        <th>${data.list[1].dt_txt}</th>
                        <th>${data.list[2].dt_txt}</th>
                        <th>${data.list[3].dt_txt}</th>
                        <th>${data.list[4].dt_txt}</th>
                        <th>${data.list[5].dt_txt}</th>
                    </tr>
                    <tr>
                        <th>&shy;</th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[0].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[1].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[2].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[3].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[4].weather[0].icon}.png"></th>
                        <th><img src="http://openweathermap.org/img/w/${data.list[5].weather[0].icon}.png"></th>
                    </tr>
                    <tr>
                        <th>Forecast</th>
                        <th>${data.list[0].weather[0].description}</th>
                        <th>${data.list[1].weather[0].description}</th>
                        <th>${data.list[2].weather[0].description}</th>
                        <th>${data.list[3].weather[0].description}</th>
                        <th>${data.list[4].weather[0].description}</th>
                        <th>${data.list[5].weather[0].description}</th>
                    </tr>
                    <tr>
                        <th>Temp(*C)</th>
                        <th>${Math.floor(data.list[0].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[1].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[2].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[3].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[4].main.temp - 273)}&deg;</th>
                        <th>${Math.floor(data.list[5].main.temp - 273)}&deg;</th>
                    </tr>
                    <tr>
                        <th>RealFeel</th>
                        <th>${Math.floor(data.list[0].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[1].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[2].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[3].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[4].main.feels_like - 273)}&deg;</th>
                        <th>${Math.floor(data.list[5].main.feels_like - 273)}&deg;</th>
                    </tr>
                    <tr>
                        <th>Wind (km/h)</th>
                        <th>${data.list[0].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[1].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[2].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[3].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[4].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                        <th>${data.list[5].wind.speed} ${data.list[0].wind.deg}&deg;</th>
                    </tr>
                </table>
    `;
}
function getHours(timestamp) {

    return new Date(+timestamp * 1000)
}