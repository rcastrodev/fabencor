let forNewsLetter = document.getElementById('formNewsletter')
async function storeNewsLetter(e){
    e.preventDefault()
    let form = e.currentTarget
    let formData = new FormData(form)
    let btn = form.querySelector('button')

    try {
        let result = await axios.post(form.getAttribute('action'), formData)
        
        if(btn){
            btn.classList.remove('bg-white')
            btn.classList.add('btn-success')
        }
            

        setTimeout(() => {
            form.reset()
            btn.classList.remove('btn-success')
            btn.classList.add('bg-white')
        }, 2000);
    
    } catch (error) {
        if(btn){
            btn.classList.add('btn-danger')
            btn.classList.remove('bg-white')
        }
            

        setTimeout(() => {
            form.reset()
            btn.classList.remove('btn-danger')
            btn.classList.add('bg-white')
        }, 2000);
    }
    
}
if (forNewsLetter) 
    forNewsLetter.addEventListener('submit', storeNewsLetter)