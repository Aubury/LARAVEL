const ex = {
    link :  'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5',
    curs : document.querySelector('#exchange'),
    arr : []
}
function  getExchange() {
     let link = ex.link,
         mass = ex.arr;

     fetch(link,
         { method:'GET'})
         .then(data => data.json())
                .then( data => {
                    for (let i = 0; i < data.length; i++){
                        mass.push(data[i]);
                    }
                    printExchange();
                 });
}
//---------------------------------------------------------------------
function  getCurrent(name, item) {
    let mass = ex.arr;

    for (let i = 0; i < mass.length; i++){

        if(mass[i].ccy === name) {

            return Math.round(parseFloat(mass[i][item])*100)/100;
            // return mass[i][item]
        }
}
//--------------------------------------------------------------------
}
function printExchange() {

    let block = ex.curs,
        info  = '';

    info += `<ul class="f-row justify-evenly">
               <li>USA : ${getCurrent('USD', 'buy')} / ${getCurrent('USD', 'sale')}</li>
               <li>EUR : ${getCurrent('EUR', 'buy')} / ${getCurrent('EUR', 'sale')}</li>
               <li>RUR : ${getCurrent('RUR', 'buy')} / ${getCurrent('RUR', 'sale')}</li>
             </ul>`;

    block.innerHTML = info;

}
getExchange()

