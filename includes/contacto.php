<!-- Contact section -->
<div class=" mt-4 contacto">
    <div id="contact">
        <h2 class="tm-text-primary">Contactanos</h2>
        <hr class="mb-5">
        <div class="row">
            <div class="col-xl-6 tm-contact-col-l mb-4">
                <form id="contact-form" action="" method="POST" class="tm-contact-form">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control rounded-0" placeholder="Nombre" required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <input type="asunto" name="asunto" class="form-control rounded-0" placeholder="Asunto" required />
                    </div>
                    <div class="form-group">
                        <textarea rows="8" style="resize: none;" name="message" class="form-control rounded-0" placeholder="Mensaje" required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 tm-contact-col-r">
                <!-- Map -->
                <div class="mapouter mb-4">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="520" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d290.0371856197937!2d-58.3631523232107!3d-34.66994942321495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a33348525b8105%3A0x688c2224c9769fa1!2sInstituto%20Tecnol%C3%B3gico%20Beltr%C3%A1n!5e0!3m2!1ses-419!2sar!4v1713374033358!5m2!1ses-419!2sar" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>

                <!-- Address -->
                <address class="mb-4">
                    Av. Manuel Belgrano 1191 <br>
                    Avellaneda, Buenos Aires, Argentina
                </address>

                <!-- Links -->
                <ul class="tm-contact-links mb-4">
                    <li class="mb-2">
                        <a href="tel:0100200340">
                            <i class="fas fa-phone mr-2 tm-contact-link-icon"></i>
                            Tel:(+54.11) 4265.0247
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@company.com">
                            <i class="fas fa-at mr-2 tm-contact-link-icon"></i>
                            Email: informes@ibeltran.com.ar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>