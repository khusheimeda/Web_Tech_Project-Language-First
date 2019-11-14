//validation script here
const inputs=document.querySelectorAll('input');

const patterns={
    age:/^\d{1,3}$/,
    email:/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2-8})?$/,
    psw:/^[\w@-]{2,20}$/
}

//validation function
function validate1(field, regex)
{
    if(regex.test(field.value)){
        field.className='valid';
        //field.classList.add('valid');
    }
    else{
        field.className='invalid';
        //field.classList.remove('invalid');
    }
    console.log(regex.test(field.value));
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',(e)=> {
        validate1(e.target,patterns[e.target.name])
    });
});