<?php 
include_once 'head.php';
include_once 'header.php';
?>

<div>
      <h1 class="tcontato">Entre em contato conosco</h1>
      <p class="stcontato">Envie sua dúvida ou sugestão e logo te responderemos.</p>
    </div>
    <section class="contato">
           <div class="container-cont">
             <div class="content">
               <div class="left-side">
                 <div class="address details">
                   <i class="fas fa-map-marker-alt"></i>
                   <div class="topic">Endereço</div>
                   <div class="text-one">IFES</div>
                   <div class="text-one">Campus Serra</div>
                 </div>
                 <div class="address details">
                   <i class="fas fa-phone-alt"></i>
                   <div class="topic">Telefone</div>
                   <div class="text-one">(27)99755-0865</div>
                   <div class="text-two">(27)3080-0781</div>
                 </div>
                 <div class="address details">
                   <i class="fas fa-envelope"></i>
                   <div class="topic">Email</div>
                   <div class="text-one">suportestunizado@gmail.com</div>
                 </div>
               </div>
               <div class="right-side">
                 <div class="topic-box">Envie sua mensagem</div>
                 <form action="#">
                  <div class="input-box">
                     <input type="text" placeholder="Digite seu nome">
                   </div>
                  <div class="input-box">
                    <input type="email" placeholder="Digite seu email">
                  </div>
                  <div class="input-box">
                    <input type="telefone" placeholder="Digite seu telefone">
                  </div>
                  <div class="input-box">
                    <input type="assunto" placeholder="Assunto da mensagem">
                  </div>
                  <div class="input-box message-box">
                    <textarea placeholder="Digite sua mensagem"></textarea>
                  </div>
                  <div class="button">
                    <input type="button" value="Enviar">
                  </div>
                 </form>
               </div>
             </div>
           </div>
    </section>





<?php 
include_once 'footer.php';
include_once 'final.php';
?>