let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
}


let tableGalery = $('#page_table_galery').DataTable({
    serverSide: true,
    ajax: `${root}/galery/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

async function findContentGalery(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataGaleryContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataGaleryContent(content)
{
    let form = document.getElementById('form-update-galery')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
}


let tableQualities = $('#page_table_qualities').DataTable({
    serverSide: true,
    ajax: `${root}/qualities/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1"},
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

async function findContentQualities(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataQualitiesContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataQualitiesContent(content)
{
    let form = document.getElementById('form-update-qualities')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
    form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1)
    CKEDITOR.instances['content_2'].setData(content.content_2);
}

