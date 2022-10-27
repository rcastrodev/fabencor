$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
})

function addVariableProduct(e)
{
    e.preventDefault()
    let btn = e.target
    if(! btn.classList.contains('addVP')) 
        return undefined

    let obj = {
        id: btn.dataset.id,
        measures: btn.dataset.measures
    }

    axios.post(btn.dataset.url, obj)
        .then(response => {
            btn.textContent = 'Agregado'
            setTimeout(() => {
                btn.textContent = 'Agregar'
            }, 1000);
        })
        .catch(error =>{
            console.error(error)
            btn.textContent = 'Error'
            setTimeout(() => {
                btn.textContent = 'Agregar'
            }, 1000);
        })
}

let table = document.querySelector('#tableVP')
table.addEventListener('click', addVariableProduct)