// var item




// document.querySelectorAll("button").forEach( function(button) {

//     button.addEventListener("click", function(event) {

//     const el = event.target || event.srcElement;

//     const value = el.value;

//     console.log(value);

//     console.log(item);


//     alert(passedArray);
//   });

// });

var id = 0
var qtn = 0.0
var total = 0
var valorUni = 0.0
var totalProd = 0.0
var tampct = 0
var prepct = 0
var desconto = 0
var verificar = 0
var aplicar = 1
var quase = 0
var precotemp = 0
var descontoAnterior = 0
var precoAtual = 0
var valorPct = 0
var tamanho = 0
var sabor = 0

convert = localStorage.getItem('totalv');
total = parseFloat(convert)
document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))






//NOVO CARRINHO

 function maisum(id) {

  convert = localStorage.getItem('totalv');
  total = parseFloat(convert)

  convert = document.getElementById("qtn".concat(id)).value
  qtn = parseInt(convert)



  qtn += 1

  document.getElementById("qtn".concat(id)).value = qtn

  convert = document.getElementById("ppct".concat(id)).value
  valorPct = parseFloat(convert)
  



  total = total + valorPct






  
  localStorage.setItem("totalv", total);

  localStorage.setItem("qtn".concat(id), qtn);


  

  document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))

 }



 function menosum(id) {
   convert = document.getElementById("qtn".concat(id)).value
   qtn = parseInt(convert)
   qtn -= 1
     if (qtn <= 0) {
       qtn = 0
        
       document.getElementById('item'.concat(id)).remove()
       localStorage.setItem("qtn".concat(id), qtn);

       precopct = document.getElementById("ppct".concat(id)).value 
       total =  localStorage.getItem("totalv");
       total = parseInt(total)
       precopct=parseFloat(precopct)
     
     
       total = total - precopct
     
       localStorage.setItem("totalv", total);
     
     
     
       document.getElementById("valorTotal").textContent ="Total: R$ ".concat(total.toFixed(2))
     
   }


  document.getElementById("qtn".concat(id)).value = qtn
 
  valorPct = document.getElementById("ppct".concat(id)).value
  total -= valorPct
  
  if (total < 0) {
    total = 0
  }

  localStorage.setItem("qtn".concat(id), qtn);

  localStorage.setItem("totalv", total);

  document.getElementById("qtn".concat(id)).value = qtn

  document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))

}




 function salvarPreco(id) {

    var id = id.replace(/[^0-9]/g, '')
    qtn = document.getElementById("qtn".concat(id)).value


   convert = document.getElementById("valor".concat(id)).value
   valorUni = parseFloat(convert)
   valorUni.toFixed(2)

   diferenca = qtn


   document.getElementById("diferenca".concat(id)).value = diferenca



 }

 
 function mudouPreco(id) {
   var id = id.replace(/[^0-9]/g, '')
   diferenca = document.getElementById("diferenca".concat(id)).value
   prepct = document.getElementById("ppct".concat(id)).value

   convert = document.getElementById("qtn".concat(id)).value
   if (convert == "") {
     convert = 0
     document.getElementById("qtn".concat(id)).value = convert
     total = total - diferenca
     if (total < 0) {
       total = 0
     }
     document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))
   }


   qtn = parseInt(convert)

   desconto=(diferenca*prepct)
   desconto = parseInt(desconto)

    
    precoAtual = (prepct * qtn)
    precoAtual = precoAtual - desconto

  
    total = parseInt(total)

    total += precoAtual
    
  
  
    
 

    document.getElementById("desconto".concat(id)).value = precoAtual


    

   if (total < 0) {
     total = 0
   }

   
   localStorage.setItem("qtn".concat(id), qtn);

   localStorage.setItem("totalv", total);

   document.getElementById("qtn".concat(id)).value = qtn
   

   document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))

   if (qtn <1){
    document.getElementById('item'.concat(id)).remove()
   }
 }





 function adicionou(id){
  
 sabor = document.getElementById("sabor".concat(id)).value
  






um = 1
conf = 0
precopct= 0


conf = localStorage.getItem("qtn".concat(id))
if (conf > 0){

    conf = parseInt(conf) + 1
    
    localStorage.setItem("qtn".concat(id), parseInt(conf)); 

    console.log(conf)

    document.getElementById("qtn".concat(id)).value = conf

    precopct = document.getElementById("ppct".concat(id)).value 
  total =  localStorage.getItem("totalv");
  total = parseInt(total)
  precopct=parseFloat(precopct)


  total = total + precopct

  localStorage.setItem("totalv", total);



  document.getElementById("valorTotal").textContent ="Total: R$ ".concat(total.toFixed(2))

  
}else{
  let novoItem = `
  <div class="itemCar" id="item${id}">
<div>
${sabor}
</div>

  <div>
  <button onclick="menosum(id)" class="carBtn" id="${id}">-</button>
  <input value="1"  name="qtnfunc" id="qtn${id}"  onchange="mudouPreco(id)" onfocus="salvarPreco(id)" class="carQtd" >  </input > 
  <button class="carBtn" onclick="maisum(id)" id="${id}">+</button>
  </div>
  </div>
  `
  document.getElementById('carlist').innerHTML += novoItem;
  sabor = document.getElementById("sabor".concat(id)).value 
  tamanho =  document.getElementById("tmnu".concat(id)).value 
  precopct = document.getElementById("ppct".concat(id)).value 
  total =  localStorage.getItem("totalv");
  total = parseInt(total)
  precopct=parseFloat(precopct)


  localStorage.setItem("ppct".concat(id), precopct) ;
  
  localStorage.setItem("tmnu".concat(id), tamanho) ;

  localStorage.setItem("sabor".concat(id), sabor) ;

  total = total + precopct

  localStorage.setItem("totalv", total);



  document.getElementById("valorTotal").textContent ="Total: R$ ".concat(total.toFixed(2))

  
  localStorage.setItem("qtn".concat(id), 1) ;
  
 }


 }

      

       


//  cariinho antigo

// function adicionou(id){

//   alert(id)
//   // convert = document.getElementById("qtn".concat(id)).value
//   // qtn = parseInt(convert)

//   // if (qtn >0){
//   // maisum(id)}

// }

// function maisum(id) {

//   convert = document.getElementById("qtn".concat(id)).value
//   qtn = parseInt(convert)


//   qtn += 1

//   document.getElementById("qtn".concat(id)).value = qtn

//   convert = document.getElementById("valor".concat(id)).value
//   valorUni = parseFloat(convert)
//   valorUni.toFixed(2)

//   total += valorUni


//   tampct = document.getElementById("tpct".concat(id)).value
//   prepct = document.getElementById("ppct".concat(id)).value



//   //aplicando desconto do pacote

//   if (prepct != "null") {


//     desconto = prepct - (valorUni * tampct)

//     verificar = qtn / tampct

//     if (Number.isInteger(verificar)) {

//       quase = 1


//       total += desconto
//     }

//     if (total < 0) {
//       total = 0
//     }
//   }
//   document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))

// }

// function menosum(id) {

//   convert = document.getElementById("qtn".concat(id)).value
//   qtn = parseInt(convert)
//   qtn -= 1

//   if (qtn < 0) {
//     qtn = 0
//   } else {



//     document.getElementById("qtn".concat(id)).value = qtn
//     tampct = document.getElementById("tpct".concat(id)).value
//     prepct = document.getElementById("ppct".concat(id)).value

//     valorUni = document.getElementById("valor".concat(id)).value

//     total -= valorUni

  
//     if (prepct != "null") {
//       desconto = prepct - (valorUni * tampct)
      
//       verificar = qtn / tampct

//       if (quase == 1) {

//         total -= desconto
//         quase = 0
//       }


//       if (Number.isInteger(verificar) && verificar != 0) {

//         quase = 1

//       }
//       if (total < 0) {
//         total = 0
//       }
//     }
//     document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))

//   }
// }




// function salvarPreco(id) {



//   var id = id.replace(/[^0-9]/g, '')



//   convert = document.getElementById("qtn".concat(id)).value
//   qtn = parseInt(convert)

//   if (qtn == null) {
//     qtn = 0
//   }

//   convert = document.getElementById("valor".concat(id)).value
//   valorUni = parseFloat(convert)
//   valorUni.toFixed(2)


//   diferenca = qtn

//   document.getElementById("diferenca".concat(id)).value = diferenca




// }


// function mudouPreco(id) {

//   var id = id.replace(/[^0-9]/g, '')


//   diferenca = document.getElementById("diferenca".concat(id)).value
//   tampct = document.getElementById("tpct".concat(id)).value
//   prepct = document.getElementById("ppct".concat(id)).value
//   descontoAnterior = document.getElementById("desconto".concat(id)).value 

 



//   convert = document.getElementById("qtn".concat(id)).value



//   if (convert == "") {
//     convert = 0
//     document.getElementById("qtn".concat(id)).value = convert
//     total = total - diferenca

//     if (total < 0) {
//       total = 0
//     }
//     document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))
//   }


//   qtn = parseInt(convert)

 
//   if (prepct == "null") {
//   total = total + (valorUni * qtn)

//   total = total - (diferenca * valorUni)





//   }else if (prepct != "null") {
    
    
//     verificar = qtn / tampct
    
    

//       verificar = parseInt(verificar)

      
//       desconto = prepct - (valorUni * tampct)
      
//       desconto =  (desconto*verificar) 
      
//       precoAtual = (valorUni * qtn)
//       precoAtual = precoAtual + desconto

      
//       total += precoAtual
//       document.getElementById("desconto".concat(id)).value = precoAtual
      

//       console.log(precoAtual)

//       descontoAnterior = parseInt(descontoAnterior)

//       total -= descontoAnterior 
    

     
//     if(qtn<diferenca){
     
//       total = total
     
//     }
//     if(qtn <= 0){
//       total = total - precoAtual
//     }
    
//   }
//   if (total < 0) {
//     total = 0
//   }

// total = total 
//   document.getElementById("valorTotal").textContent = "Total: R$ ".concat(total.toFixed(2))


// }

