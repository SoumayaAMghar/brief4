var form

////////////////////ADD///////////////////////////
var add = document.querySelector('.add')
add.addEventListener('click', display_add_form)

function display_add_form(){
    form = document.querySelector('.add-form')
    form.style.display = 'flex';
}   
///////////////////////EDIT////////////////////////////
var edit = document.querySelectorAll('.edit')

edit.forEach(function(element){
    element.addEventListener('click',function(){
        form = document.querySelector('.edit-form')
        form.style.display = 'flex';
        document.querySelector('.ref-hidden').value = element.dataset.ref;
        document.querySelector('.name-hidden').value = element.dataset.name;
        document.querySelector('.category-hidden').value = element.dataset.category;
        document.querySelector('.material-hidden').value = element.dataset.material;
        document.querySelector('.size-hidden').value = element.dataset.size;
        document.querySelector('.price-hidden').value = element.dataset.price;
        document.querySelector('.stock-hidden').value = element.dataset.stock;
 
    })
})

////////////////////////View///////////////////////

var view = document.querySelectorAll('.view')

view.forEach(function(element){
    element.addEventListener('click',function(){
        form = document.querySelector('.view-form')
        form.style.display = 'flex';
        
        document.querySelector(".display-img img").setAttribute('src',"products.images/"+element.dataset.img);
        document.querySelector(".catch-name").textContent = element.dataset.name;
        document.querySelector(".catch-ref").textContent = "#"+element.dataset.ref;
        document.querySelector(".catch-material").textContent = element.dataset.material;
        document.querySelector(".catch-category").textContent = element.dataset.category;
        document.querySelector(".catch-price").textContent = element.dataset.price;
        document.querySelector(".catch-size").textContent = element.dataset.size;
        document.querySelector(".catch-stock").textContent = element.dataset.stock;

    })
});

///////////////////////CLOSE//////////////////////

var close_button = document.querySelectorAll('.close-button')

close_button.forEach(function(element){
    element.addEventListener('click',close_lightbox)
});

function close_lightbox(){
   form.style.display = 'none';
}

/////////////////////FILTER////////////////////

const filter = document.querySelector('.form-filter');
const filter_icon = document.getElementById('filter-icon');
filter_icon.addEventListener('click',function(){
    filter.classList.toggle('show')
})


