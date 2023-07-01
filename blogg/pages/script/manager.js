let add=document.querySelector('#add');
add.addEventListener('click',()=>{
    // console.log('clicked');
    document.querySelector('.add-form').classList.add('active');
});

document.querySelector('#closeADD').addEventListener('click',()=>{
    // console.log('clicked');
    document.querySelector('.add-form').classList.remove('active');
});


// document.querySelector('#update').addEventListener('click',()=>{
//     // console.log('clicked');
//     document.querySelector('.update-form').classList.add('active');
// });

// document.querySelector('#closeUP').addEventListener('click',()=>{
//     // console.log('clicked');
//     document.querySelector('.update-form').classList.remove('active');
// });

function pop() {
    document.querySelector('.update-form').classList.toggle('active');
    document.querySelector('#closeUP').addEventListener('click',()=>{
        // console.log('clicked');
        document.querySelector('.update-form').classList.remove('active');
    });
}