	  
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js">
 
  const allCross = document.querySelectorAll('.visible-pannel img');
console.log(allCross);

 allCross.forEach(element=>
 {element.addEventListener('click', function(){

        const height = this.parentNode.parentNode.childNodes[3].scrollHeight;

        const currentChoice = this.parentNode.parentNode.childNodes[3];

        // console.log(this.src);
        if(this.src.includes('down')){
            this. src="{{asset('images/up.svg')}}";
            gsap.to(currentChoice, {duration: 0.2, height: height + 40, opacity: 1, padding: '20px 15px'})
        } else if (this.src.includes('up')){
            this.src="{{asset('images/down.svg')}}";
            gsap.to(currentChoice, {duration: 0.2, height: 0, opacity: 0, padding: '0px 15px'})
        }
        
    })

})
  </script>