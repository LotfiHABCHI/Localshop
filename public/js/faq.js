const allCross = document.querySelectorAll('.visible-pannel img');
console.log(allCross);

allCross.forEach(element => {

    element.addEventListener('click', function(){

        const height = this.parentNode.parentNode.childNodes[3].scrollHeight;

        const currentChoice = this.parentNode.parentNode.childNodes[3];

        // console.log(this.src);
        if(this.src.includes('down')){
            this.src = "{{ asset('/storage/image/up.svg') }}";
            gsap.to(currentChoice, {duration: 0.2, height: height + 40, opacity: 1, padding: '20px 15px'})
        } else if (this.src.includes('up')){
            this.src = "URL::asset('image/down.svg')"
            gsap.to(currentChoice, {duration: 0.2, height: 0, opacity: 0, padding: '0px 15px'})
        }

    })

})



/const inputs = document.querySelectorAll('textarea');

for (let i = 0; i < inputs.length; i++) {

    let field = inputs[i];

    field.addEventListener('textarea', (e) => {

        if(e.target.value != ""){
            e.target.parentNode.classList.add('animation');
        } else if (e.target.value == "") {
            e.target.parentNode.classList.remove('animation');
        }

    })

}/