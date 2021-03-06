<?php

use yii\web\View;

$this->title = 'All Countries' . ' - ' . Yii::$app->name;

?>
<div class="site-index">

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="module-title font-alt" data-type="0">
                All Countries
            </h1>
            <h2 class="module-subtitle font-serif">
                From which we have interesting pics
            </h2>
        </div>
    </div>

    <section class="module-small">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 mb-sm-20">
                <div class="form-group field-name">
                    <input type="text" id="name" class="form-control quicksearch" name="name"
                           placeholder="Country Name"
                           aria-invalid="false">
                </div>
            </div>

        </div>

    </section>

    <hr class="divider-w">

    <section class="module-small">
        <div class="col-sm-12">
            <ul class="filter font-alt" id="filters">

                <li class="country albania" data-name="Albania">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/albania">
                        <img class="flag flag-in-button" src="/images/flags/al.svg" alt="Albania"
                             title="Albania"> Albania </a>

                </li>
                <li class="country algeria" data-name="Algeria">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/algeria">
                        <img class="flag flag-in-button" src="/images/flags/dz.svg" alt="Algeria"
                             title="Algeria"> Algeria </a>

                </li>
                <li class="country andorra" data-name="Andorra">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/andorra">
                        <img class="flag flag-in-button" src="/images/flags/ad.svg" alt="Andorra"
                             title="Andorra"> Andorra </a>

                </li>
                <li class="country angola" data-name="Angola">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/angola">
                        <img class="flag flag-in-button" src="/images/flags/ao.svg" alt="Angola" title="Angola">
                        Angola </a>

                </li>
                <li class="country antigua-and-barbuda" data-name="Antigua and Barbuda">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/antigua-and-barbuda">
                        <img class="flag flag-in-button" src="/images/flags/ag.svg" alt="Antigua and Barbuda"
                             title="Antigua and Barbuda"> Antigua and Barbuda </a>

                </li>
                <li class="country argentina" data-name="Argentina">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/argentina">
                        <img class="flag flag-in-button" src="/images/flags/ar.svg" alt="Argentina"
                             title="Argentina"> Argentina </a>

                </li>
                <li class="country armenia" data-name="Armenia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/armenia">
                        <img class="flag flag-in-button" src="/images/flags/am.svg" alt="Armenia"
                             title="Armenia"> Armenia </a>

                </li>
                <li class="country australia" data-name="Australia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/australia">
                        <img class="flag flag-in-button" src="/images/flags/au.svg" alt="Australia"
                             title="Australia"> Australia </a>

                </li>
                <li class="country austria" data-name="Austria">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/austria">
                        <img class="flag flag-in-button" src="/images/flags/at.svg" alt="Austria"
                             title="Austria"> Austria </a>

                </li>
                <li class="country azerbaijan" data-name="Azerbaijan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/azerbaijan">
                        <img class="flag flag-in-button" src="/images/flags/az.svg" alt="Azerbaijan"
                             title="Azerbaijan"> Azerbaijan </a>

                </li>
                <li class="country bahamas" data-name="Bahamas">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bahamas">
                        <img class="flag flag-in-button" src="/images/flags/bs.svg" alt="Bahamas"
                             title="Bahamas"> Bahamas </a>

                </li>
                <li class="country bahrain" data-name="Bahrain">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bahrain">
                        <img class="flag flag-in-button" src="/images/flags/bh.svg" alt="Bahrain"
                             title="Bahrain"> Bahrain </a>

                </li>
                <li class="country bangladesh" data-name="Bangladesh">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bangladesh">
                        <img class="flag flag-in-button" src="/images/flags/bd.svg" alt="Bangladesh"
                             title="Bangladesh"> Bangladesh </a>

                </li>
                <li class="country barbados" data-name="Barbados">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/barbados">
                        <img class="flag flag-in-button" src="/images/flags/bb.svg" alt="Barbados"
                             title="Barbados"> Barbados </a>

                </li>
                <li class="country belarus" data-name="Belarus">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/belarus">
                        <img class="flag flag-in-button" src="/images/flags/by.svg" alt="Belarus"
                             title="Belarus"> Belarus </a>

                </li>
                <li class="country belgium" data-name="Belgium">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/belgium">
                        <img class="flag flag-in-button" src="/images/flags/be.svg" alt="Belgium"
                             title="Belgium"> Belgium </a>

                </li>
                <li class="country benin" data-name="Benin">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/benin">
                        <img class="flag flag-in-button" src="/images/flags/bj.svg" alt="Benin" title="Benin">
                        Benin </a>

                </li>
                <li class="country bolivia" data-name="Bolivia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bolivia">
                        <img class="flag flag-in-button" src="/images/flags/bo.svg" alt="Bolivia"
                             title="Bolivia"> Bolivia </a>

                </li>
                <li class="country bosnia-and-herzegovina" data-name="Bosnia and Herzegovina">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bosnia-and-herzegovina">
                        <img class="flag flag-in-button" src="/images/flags/ba.svg" alt="Bosnia and Herzegovina"
                             title="Bosnia and Herzegovina"> Bosnia and Herzegovina </a>

                </li>
                <li class="country botswana" data-name="Botswana">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/botswana">
                        <img class="flag flag-in-button" src="/images/flags/bw.svg" alt="Botswana"
                             title="Botswana"> Botswana </a>

                </li>
                <li class="country brazil" data-name="Brazil">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/brazil">
                        <img class="flag flag-in-button" src="/images/flags/br.svg" alt="Brazil" title="Brazil">
                        Brazil </a>

                </li>
                <li class="country brunei-darussalam" data-name="Brunei Darussalam">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/brunei-darussalam">
                        <img class="flag flag-in-button" src="/images/flags/bn.svg" alt="Brunei Darussalam"
                             title="Brunei Darussalam"> Brunei Darussalam </a>

                </li>
                <li class="country bulgaria" data-name="Bulgaria">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/bulgaria">
                        <img class="flag flag-in-button" src="/images/flags/bg.svg" alt="Bulgaria"
                             title="Bulgaria"> Bulgaria </a>

                </li>
                <li class="country burundi" data-name="Burundi">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/burundi">
                        <img class="flag flag-in-button" src="/images/flags/bi.svg" alt="Burundi"
                             title="Burundi"> Burundi </a>

                </li>
                <li class="country cambodia" data-name="Cambodia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/cambodia">
                        <img class="flag flag-in-button" src="/images/flags/kh.svg" alt="Cambodia"
                             title="Cambodia"> Cambodia </a>

                </li>
                <li class="country cameroon" data-name="Cameroon">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/cameroon">
                        <img class="flag flag-in-button" src="/images/flags/cm.svg" alt="Cameroon"
                             title="Cameroon"> Cameroon </a>

                </li>
                <li class="country canada" data-name="Canada">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/canada">
                        <img class="flag flag-in-button" src="/images/flags/ca.svg" alt="Canada" title="Canada">
                        Canada </a>

                </li>
                <li class="country cape-verde" data-name="Cape Verde">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/cape-verde">
                        <img class="flag flag-in-button" src="/images/flags/cv.svg" alt="Cape Verde"
                             title="Cape Verde"> Cape Verde </a>

                </li>
                <li class="country chile" data-name="Chile">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/chile">
                        <img class="flag flag-in-button" src="/images/flags/cl.svg" alt="Chile" title="Chile">
                        Chile </a>

                </li>
                <li class="country china" data-name="China">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/china">
                        <img class="flag flag-in-button" src="/images/flags/cn.svg" alt="China" title="China">
                        China </a>

                </li>
                <li class="country colombia" data-name="Colombia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/colombia">
                        <img class="flag flag-in-button" src="/images/flags/co.svg" alt="Colombia"
                             title="Colombia"> Colombia </a>

                </li>
                <li class="country cook-islands" data-name="Cook Islands">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/cook-islands">
                        <img class="flag flag-in-button" src="/images/flags/ck.svg" alt="Cook Islands"
                             title="Cook Islands"> Cook Islands </a>

                </li>
                <li class="country costa-rica" data-name="Costa Rica">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/costa-rica">
                        <img class="flag flag-in-button" src="/images/flags/cr.svg" alt="Costa Rica"
                             title="Costa Rica"> Costa Rica </a>

                </li>
                <li class="country croatia-hrvatska" data-name="Croatia (Hrvatska)">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/croatia-hrvatska">
                        <img class="flag flag-in-button" src="/images/flags/hr.svg" alt="Croatia (Hrvatska)"
                             title="Croatia (Hrvatska)"> Croatia (Hrvatska) </a>

                </li>
                <li class="country cyprus" data-name="Cyprus">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/cyprus">
                        <img class="flag flag-in-button" src="/images/flags/cy.svg" alt="Cyprus" title="Cyprus">
                        Cyprus </a>

                </li>
                <li class="country czech-republic" data-name="Czech Republic">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/czech-republic">
                        <img class="flag flag-in-button" src="/images/flags/cz.svg" alt="Czech Republic"
                             title="Czech Republic"> Czech Republic </a>

                </li>
                <li class="country denmark" data-name="Denmark">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/denmark">
                        <img class="flag flag-in-button" src="/images/flags/dk.svg" alt="Denmark"
                             title="Denmark"> Denmark </a>

                </li>
                <li class="country dominican-republic" data-name="Dominican Republic">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/dominican-republic">
                        <img class="flag flag-in-button" src="/images/flags/do.svg" alt="Dominican Republic"
                             title="Dominican Republic"> Dominican Republic </a>

                </li>
                <li class="country ecuador" data-name="Ecuador">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/ecuador">
                        <img class="flag flag-in-button" src="/images/flags/ec.svg" alt="Ecuador"
                             title="Ecuador"> Ecuador </a>

                </li>
                <li class="country egypt" data-name="Egypt">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/egypt">
                        <img class="flag flag-in-button" src="/images/flags/eg.svg" alt="Egypt" title="Egypt">
                        Egypt </a>

                </li>
                <li class="country el-salvador" data-name="El Salvador">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/el-salvador">
                        <img class="flag flag-in-button" src="/images/flags/sv.svg" alt="El Salvador"
                             title="El Salvador"> El Salvador </a>

                </li>
                <li class="country estonia" data-name="Estonia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/estonia">
                        <img class="flag flag-in-button" src="/images/flags/ee.svg" alt="Estonia"
                             title="Estonia"> Estonia </a>

                </li>
                <li class="country europe" data-name="Europe">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/europe">
                        <img class="flag flag-in-button" src="/images/flags/eu.svg" alt="Europe" title="Europe">
                        Europe </a>

                </li>
                <li class="country faroe-islands" data-name="Faroe Islands">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/faroe-islands">
                        <img class="flag flag-in-button" src="/images/flags/fo.svg" alt="Faroe Islands"
                             title="Faroe Islands"> Faroe Islands </a>

                </li>
                <li class="country finland" data-name="Finland">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/finland">
                        <img class="flag flag-in-button" src="/images/flags/fi.svg" alt="Finland"
                             title="Finland"> Finland </a>

                </li>
                <li class="country france" data-name="France">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/france">
                        <img class="flag flag-in-button" src="/images/flags/fr.svg" alt="France" title="France">
                        France </a>

                </li>
                <li class="country french-guiana" data-name="French Guiana">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/french-guiana">
                        <img class="flag flag-in-button" src="/images/flags/gf.svg" alt="French Guiana"
                             title="French Guiana"> French Guiana </a>

                </li>
                <li class="country gabon" data-name="Gabon">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/gabon">
                        <img class="flag flag-in-button" src="/images/flags/ga.svg" alt="Gabon" title="Gabon">
                        Gabon </a>

                </li>
                <li class="country georgia" data-name="Georgia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/georgia">
                        <img class="flag flag-in-button" src="/images/flags/ge.svg" alt="Georgia"
                             title="Georgia"> Georgia </a>

                </li>
                <li class="country germany" data-name="Germany">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/germany">
                        <img class="flag flag-in-button" src="/images/flags/de.svg" alt="Germany"
                             title="Germany"> Germany </a>

                </li>
                <li class="country ghana" data-name="Ghana">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/ghana">
                        <img class="flag flag-in-button" src="/images/flags/gh.svg" alt="Ghana" title="Ghana">
                        Ghana </a>

                </li>
                <li class="country greece" data-name="Greece">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/greece">
                        <img class="flag flag-in-button" src="/images/flags/gr.svg" alt="Greece" title="Greece">
                        Greece </a>

                </li>
                <li class="country grenada" data-name="Grenada">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/grenada">
                        <img class="flag flag-in-button" src="/images/flags/gd.svg" alt="Grenada"
                             title="Grenada"> Grenada </a>

                </li>
                <li class="country guadeloupe" data-name="Guadeloupe">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/guadeloupe">
                        <img class="flag flag-in-button" src="/images/flags/gp.svg" alt="Guadeloupe"
                             title="Guadeloupe"> Guadeloupe </a>

                </li>
                <li class="country haiti" data-name="Haiti">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/haiti">
                        <img class="flag flag-in-button" src="/images/flags/ht.svg" alt="Haiti" title="Haiti">
                        Haiti </a>

                </li>
                <li class="country honduras" data-name="Honduras">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/honduras">
                        <img class="flag flag-in-button" src="/images/flags/hn.svg" alt="Honduras"
                             title="Honduras"> Honduras </a>

                </li>
                <li class="country hong-kong" data-name="Hong Kong">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/hong-kong">
                        <img class="flag flag-in-button" src="/images/flags/hk.svg" alt="Hong Kong"
                             title="Hong Kong"> Hong Kong </a>

                </li>
                <li class="country hungary" data-name="Hungary">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/hungary">
                        <img class="flag flag-in-button" src="/images/flags/hu.svg" alt="Hungary"
                             title="Hungary"> Hungary </a>

                </li>
                <li class="country iceland" data-name="Iceland">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/iceland">
                        <img class="flag flag-in-button" src="/images/flags/is.svg" alt="Iceland"
                             title="Iceland"> Iceland </a>

                </li>
                <li class="country india" data-name="India">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/india">
                        <img class="flag flag-in-button" src="/images/flags/in.svg" alt="India" title="India">
                        India </a>

                </li>
                <li class="country indonesia" data-name="Indonesia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/indonesia">
                        <img class="flag flag-in-button" src="/images/flags/id.svg" alt="Indonesia"
                             title="Indonesia"> Indonesia </a>

                </li>
                <li class="country ireland" data-name="Ireland">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/ireland">
                        <img class="flag flag-in-button" src="/images/flags/ie.svg" alt="Ireland"
                             title="Ireland"> Ireland </a>

                </li>
                <li class="country israel" data-name="Israel">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/israel">
                        <img class="flag flag-in-button" src="/images/flags/il.svg" alt="Israel" title="Israel">
                        Israel </a>

                </li>
                <li class="country italy" data-name="Italy">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/italy">
                        <img class="flag flag-in-button" src="/images/flags/it.svg" alt="Italy" title="Italy">
                        Italy </a>

                </li>
                <li class="country jamaica" data-name="Jamaica">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/jamaica">
                        <img class="flag flag-in-button" src="/images/flags/jm.svg" alt="Jamaica"
                             title="Jamaica"> Jamaica </a>

                </li>
                <li class="country japan" data-name="Japan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/japan">
                        <img class="flag flag-in-button" src="/images/flags/jp.svg" alt="Japan" title="Japan">
                        Japan </a>

                </li>
                <li class="country jordan" data-name="Jordan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/jordan">
                        <img class="flag flag-in-button" src="/images/flags/jo.svg" alt="Jordan" title="Jordan">
                        Jordan </a>

                </li>
                <li class="country kazakhstan" data-name="Kazakhstan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/kazakhstan">
                        <img class="flag flag-in-button" src="/images/flags/kz.svg" alt="Kazakhstan"
                             title="Kazakhstan"> Kazakhstan </a>

                </li>
                <li class="country kenya" data-name="Kenya">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/kenya">
                        <img class="flag flag-in-button" src="/images/flags/ke.svg" alt="Kenya" title="Kenya">
                        Kenya </a>

                </li>
                <li class="country korea-republic-of" data-name="Korea, Republic of">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/korea-republic-of">
                        <img class="flag flag-in-button" src="/images/flags/kr.svg" alt="Korea, Republic of"
                             title="Korea, Republic of"> Korea, Republic of </a>

                </li>
                <li class="country kuwait" data-name="Kuwait">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/kuwait">
                        <img class="flag flag-in-button" src="/images/flags/kw.svg" alt="Kuwait" title="Kuwait">
                        Kuwait </a>

                </li>
                <li class="country kyrgyzstan" data-name="Kyrgyzstan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/kyrgyzstan">
                        <img class="flag flag-in-button" src="/images/flags/kg.svg" alt="Kyrgyzstan"
                             title="Kyrgyzstan"> Kyrgyzstan </a>

                </li>
                <li class="country latvia" data-name="Latvia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/latvia">
                        <img class="flag flag-in-button" src="/images/flags/lv.svg" alt="Latvia" title="Latvia">
                        Latvia </a>

                </li>
                <li class="country lebanon" data-name="Lebanon">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/lebanon">
                        <img class="flag flag-in-button" src="/images/flags/lb.svg" alt="Lebanon"
                             title="Lebanon"> Lebanon </a>

                </li>
                <li class="country lithuania" data-name="Lithuania">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/lithuania">
                        <img class="flag flag-in-button" src="/images/flags/lt.svg" alt="Lithuania"
                             title="Lithuania"> Lithuania </a>

                </li>
                <li class="country luxembourg" data-name="Luxembourg">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/luxembourg">
                        <img class="flag flag-in-button" src="/images/flags/lu.svg" alt="Luxembourg"
                             title="Luxembourg"> Luxembourg </a>

                </li>
                <li class="country macedonia" data-name="Macedonia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/macedonia">
                        <img class="flag flag-in-button" src="/images/flags/mk.svg" alt="Macedonia"
                             title="Macedonia"> Macedonia </a>

                </li>
                <li class="country malaysia" data-name="Malaysia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/malaysia">
                        <img class="flag flag-in-button" src="/images/flags/my.svg" alt="Malaysia"
                             title="Malaysia"> Malaysia </a>

                </li>
                <li class="country maldives" data-name="Maldives">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/maldives">
                        <img class="flag flag-in-button" src="/images/flags/mv.svg" alt="Maldives"
                             title="Maldives"> Maldives </a>

                </li>
                <li class="country malta" data-name="Malta">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/malta">
                        <img class="flag flag-in-button" src="/images/flags/mt.svg" alt="Malta" title="Malta">
                        Malta </a>

                </li>
                <li class="country martinique" data-name="Martinique">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/martinique">
                        <img class="flag flag-in-button" src="/images/flags/mq.svg" alt="Martinique"
                             title="Martinique"> Martinique </a>

                </li>
                <li class="country mauritius" data-name="Mauritius">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/mauritius">
                        <img class="flag flag-in-button" src="/images/flags/mu.svg" alt="Mauritius"
                             title="Mauritius"> Mauritius </a>

                </li>
                <li class="country mexico" data-name="Mexico">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/mexico">
                        <img class="flag flag-in-button" src="/images/flags/mx.svg" alt="Mexico" title="Mexico">
                        Mexico </a>

                </li>
                <li class="country moldova-republic-of" data-name="Moldova, Republic of">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/moldova-republic-of">
                        <img class="flag flag-in-button" src="/images/flags/md.svg" alt="Moldova, Republic of"
                             title="Moldova, Republic of"> Moldova, Republic of </a>

                </li>
                <li class="country monaco" data-name="Monaco">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/monaco">
                        <img class="flag flag-in-button" src="/images/flags/mc.svg" alt="Monaco" title="Monaco">
                        Monaco </a>

                </li>
                <li class="country mongolia" data-name="Mongolia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/mongolia">
                        <img class="flag flag-in-button" src="/images/flags/mn.svg" alt="Mongolia"
                             title="Mongolia"> Mongolia </a>

                </li>
                <li class="country montenegro" data-name="Montenegro">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/montenegro">
                        <img class="flag flag-in-button" src="/images/flags/me.svg" alt="Montenegro"
                             title="Montenegro"> Montenegro </a>

                </li>
                <li class="country morocco" data-name="Morocco">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/morocco">
                        <img class="flag flag-in-button" src="/images/flags/ma.svg" alt="Morocco"
                             title="Morocco"> Morocco </a>

                </li>
                <li class="country mozambique" data-name="Mozambique">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/mozambique">
                        <img class="flag flag-in-button" src="/images/flags/mz.svg" alt="Mozambique"
                             title="Mozambique"> Mozambique </a>

                </li>
                <li class="country namibia" data-name="Namibia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/namibia">
                        <img class="flag flag-in-button" src="/images/flags/na.svg" alt="Namibia"
                             title="Namibia"> Namibia </a>

                </li>
                <li class="country netherlands" data-name="Netherlands">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/netherlands">
                        <img class="flag flag-in-button" src="/images/flags/nl.svg" alt="Netherlands"
                             title="Netherlands"> Netherlands </a>

                </li>
                <li class="country netherlands-antilles" data-name="Netherlands Antilles">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/netherlands-antilles">
                        <img class="flag flag-in-button" src="/images/flags/an.svg" alt="Netherlands Antilles"
                             title="Netherlands Antilles"> Netherlands Antilles </a>

                </li>
                <li class="country new-caledonia" data-name="New Caledonia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/new-caledonia">
                        <img class="flag flag-in-button" src="/images/flags/nc.svg" alt="New Caledonia"
                             title="New Caledonia"> New Caledonia </a>

                </li>
                <li class="country new-zealand" data-name="New Zealand">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/new-zealand">
                        <img class="flag flag-in-button" src="/images/flags/nz.svg" alt="New Zealand"
                             title="New Zealand"> New Zealand </a>

                </li>
                <li class="country nicaragua" data-name="Nicaragua">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/nicaragua">
                        <img class="flag flag-in-button" src="/images/flags/ni.svg" alt="Nicaragua"
                             title="Nicaragua"> Nicaragua </a>

                </li>
                <li class="country nigeria" data-name="Nigeria">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/nigeria">
                        <img class="flag flag-in-button" src="/images/flags/ng.svg" alt="Nigeria"
                             title="Nigeria"> Nigeria </a>

                </li>
                <li class="country norway" data-name="Norway">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/norway">
                        <img class="flag flag-in-button" src="/images/flags/no.svg" alt="Norway" title="Norway">
                        Norway </a>

                </li>
                <li class="country oman" data-name="Oman">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/oman">
                        <img class="flag flag-in-button" src="/images/flags/om.svg" alt="Oman" title="Oman">
                        Oman </a>

                </li>
                <li class="country pakistan" data-name="Pakistan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/pakistan">
                        <img class="flag flag-in-button" src="/images/flags/pk.svg" alt="Pakistan"
                             title="Pakistan"> Pakistan </a>

                </li>
                <li class="country palestine" data-name="Palestine">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/palestine">
                        <img class="flag flag-in-button" src="/images/flags/ps.svg" alt="Palestine"
                             title="Palestine"> Palestine </a>

                </li>
                <li class="country panama" data-name="Panama">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/panama">
                        <img class="flag flag-in-button" src="/images/flags/pa.svg" alt="Panama" title="Panama">
                        Panama </a>

                </li>
                <li class="country paraguay" data-name="Paraguay">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/paraguay">
                        <img class="flag flag-in-button" src="/images/flags/py.svg" alt="Paraguay"
                             title="Paraguay"> Paraguay </a>

                </li>
                <li class="country peru" data-name="Peru">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/peru">
                        <img class="flag flag-in-button" src="/images/flags/pe.svg" alt="Peru" title="Peru">
                        Peru </a>

                </li>
                <li class="country philippines" data-name="Philippines">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/philippines">
                        <img class="flag flag-in-button" src="/images/flags/ph.svg" alt="Philippines"
                             title="Philippines"> Philippines </a>

                </li>
                <li class="country poland" data-name="Poland">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/poland">
                        <img class="flag flag-in-button" src="/images/flags/pl.svg" alt="Poland" title="Poland">
                        Poland </a>

                </li>
                <li class="country portugal" data-name="Portugal">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/portugal">
                        <img class="flag flag-in-button" src="/images/flags/pt.svg" alt="Portugal"
                             title="Portugal"> Portugal </a>

                </li>
                <li class="country puerto-rico" data-name="Puerto Rico">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/puerto-rico">
                        <img class="flag flag-in-button" src="/images/flags/pr.svg" alt="Puerto Rico"
                             title="Puerto Rico"> Puerto Rico </a>

                </li>
                <li class="country qatar" data-name="Qatar">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/qatar">
                        <img class="flag flag-in-button" src="/images/flags/qa.svg" alt="Qatar" title="Qatar">
                        Qatar </a>

                </li>
                <li class="country reunion" data-name="Reunion">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/reunion">
                        <img class="flag flag-in-button" src="/images/flags/re.svg" alt="Reunion"
                             title="Reunion"> Reunion </a>

                </li>
                <li class="country romania" data-name="Romania">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/romania">
                        <img class="flag flag-in-button" src="/images/flags/ro.svg" alt="Romania"
                             title="Romania"> Romania </a>

                </li>
                <li class="country russian-federation" data-name="Russian">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/russian-federation">
                        <img class="flag flag-in-button" src="/images/flags/ru.svg" alt="Russian"
                             title="Russian"> Russian </a>

                </li>
                <li class="country saint-lucia" data-name="Saint Lucia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/saint-lucia">
                        <img class="flag flag-in-button" src="/images/flags/lc.svg" alt="Saint Lucia"
                             title="Saint Lucia"> Saint Lucia </a>

                </li>
                <li class="country saudi-arabia" data-name="Saudi Arabia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/saudi-arabia">
                        <img class="flag flag-in-button" src="/images/flags/sa.svg" alt="Saudi Arabia"
                             title="Saudi Arabia"> Saudi Arabia </a>

                </li>
                <li class="country serbia" data-name="Serbia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/serbia">
                        <img class="flag flag-in-button" src="/images/flags/srb.svg" alt="Serbia"
                             title="Serbia"> Serbia </a>

                </li>
                <li class="country seychelles" data-name="Seychelles">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/seychelles">
                        <img class="flag flag-in-button" src="/images/flags/sc.svg" alt="Seychelles"
                             title="Seychelles"> Seychelles </a>

                </li>
                <li class="country singapore" data-name="Singapore">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/singapore">
                        <img class="flag flag-in-button" src="/images/flags/sg.svg" alt="Singapore"
                             title="Singapore"> Singapore </a>

                </li>
                <li class="country sint-maarten" data-name="Sint Maarten">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/sint-maarten">
                        <img class="flag flag-in-button" src="/images/flags/sx.svg" alt="Sint Maarten"
                             title="Sint Maarten"> Sint Maarten </a>

                </li>
                <li class="country slovakia" data-name="Slovakia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/slovakia">
                        <img class="flag flag-in-button" src="/images/flags/sk.svg" alt="Slovakia"
                             title="Slovakia"> Slovakia </a>

                </li>
                <li class="country slovenia" data-name="Slovenia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/slovenia">
                        <img class="flag flag-in-button" src="/images/flags/si.svg" alt="Slovenia"
                             title="Slovenia"> Slovenia </a>

                </li>
                <li class="country south-africa" data-name="South Africa">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/south-africa">
                        <img class="flag flag-in-button" src="/images/flags/za.svg" alt="South Africa"
                             title="South Africa"> South Africa </a>

                </li>
                <li class="country spain" data-name="Spain">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/spain">
                        <img class="flag flag-in-button" src="/images/flags/es.svg" alt="Spain" title="Spain">
                        Spain </a>

                </li>
                <li class="country sri-lanka" data-name="Sri Lanka">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/sri-lanka">
                        <img class="flag flag-in-button" src="/images/flags/lk.svg" alt="Sri Lanka"
                             title="Sri Lanka"> Sri Lanka </a>

                </li>
                <li class="country sweden" data-name="Sweden">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/sweden">
                        <img class="flag flag-in-button" src="/images/flags/se.svg" alt="Sweden" title="Sweden">
                        Sweden </a>

                </li>
                <li class="country switzerland" data-name="Switzerland">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/switzerland">
                        <img class="flag flag-in-button" src="/images/flags/ch.svg" alt="Switzerland"
                             title="Switzerland"> Switzerland </a>

                </li>
                <li class="country taiwan" data-name="Taiwan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/taiwan">
                        <img class="flag flag-in-button" src="/images/flags/tw.svg" alt="Taiwan" title="Taiwan">
                        Taiwan </a>

                </li>
                <li class="country tajikistan" data-name="Tajikistan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/tajikistan">
                        <img class="flag flag-in-button" src="/images/flags/tj.svg" alt="Tajikistan"
                             title="Tajikistan"> Tajikistan </a>

                </li>
                <li class="country thailand" data-name="Thailand">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/thailand">
                        <img class="flag flag-in-button" src="/images/flags/th.svg" alt="Thailand"
                             title="Thailand"> Thailand </a>

                </li>
                <li class="country togo" data-name="Togo">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/togo">
                        <img class="flag flag-in-button" src="/images/flags/tg.svg" alt="Togo" title="Togo">
                        Togo </a>

                </li>
                <li class="country trinidad-and-tobago" data-name="Trinidad and Tobago">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/trinidad-and-tobago">
                        <img class="flag flag-in-button" src="/images/flags/tt.svg" alt="Trinidad and Tobago"
                             title="Trinidad and Tobago"> Trinidad and Tobago </a>

                </li>
                <li class="country turkey" data-name="Turkey">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/turkey">
                        <img class="flag flag-in-button" src="/images/flags/tr.svg" alt="Turkey" title="Turkey">
                        Turkey </a>

                </li>
                <li class="country uganda" data-name="Uganda">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/uganda">
                        <img class="flag flag-in-button" src="/images/flags/ug.svg" alt="Uganda" title="Uganda">
                        Uganda </a>

                </li>
                <li class="country ukraine" data-name="Ukraine">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/ukraine">
                        <img class="flag flag-in-button" src="/images/flags/ua.svg" alt="Ukraine"
                             title="Ukraine"> Ukraine </a>

                </li>
                <li class="country united-arab-emirates" data-name="United Arab Emirates">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/united-arab-emirates">
                        <img class="flag flag-in-button" src="/images/flags/ae.svg" alt="United Arab Emirates"
                             title="United Arab Emirates"> United Arab Emirates </a>

                </li>
                <li class="country united-kingdom" data-name="United Kingdom">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/united-kingdom">
                        <img class="flag flag-in-button" src="/images/flags/uk.svg" alt="United Kingdom"
                             title="United Kingdom"> United Kingdom </a>

                </li>
                <li class="country united-states" data-name="United States">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/united-states">
                        <img class="flag flag-in-button" src="/images/flags/us.svg" alt="United States"
                             title="United States"> United States </a>

                </li>
                <li class="country uruguay" data-name="Uruguay">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/uruguay">
                        <img class="flag flag-in-button" src="/images/flags/uy.svg" alt="Uruguay"
                             title="Uruguay"> Uruguay </a>

                </li>
                <li class="country uzbekistan" data-name="Uzbekistan">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/uzbekistan">
                        <img class="flag flag-in-button" src="/images/flags/uz.svg" alt="Uzbekistan"
                             title="Uzbekistan"> Uzbekistan </a>

                </li>
                <li class="country venezuela" data-name="Venezuela">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/venezuela">
                        <img class="flag flag-in-button" src="/images/flags/ve.svg" alt="Venezuela"
                             title="Venezuela"> Venezuela </a>

                </li>
                <li class="country vietnam" data-name="Vietnam">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/vietnam">
                        <img class="flag flag-in-button" src="/images/flags/vn.svg" alt="Vietnam"
                             title="Vietnam"> Vietnam </a>

                </li>
                <li class="country yugoslavia" data-name="Yugoslavia">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/yugoslavia">
                        <img class="flag flag-in-button" src="/images/flags/yu.svg" alt="Yugoslavia"
                             title="Yugoslavia"> Yugoslavia </a>

                </li>
                <li class="country zaire" data-name="Zaire">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/zaire">
                        <img class="flag flag-in-button" src="/images/flags/zr.svg" alt="Zaire" title="Zaire">
                        Zaire </a>

                </li>
                <li class="country zimbabwe" data-name="Zimbabwe">
                    <a class="btn btn-border-d btn-round btn-country" href="/country/zimbabwe">
                        <img class="flag flag-in-button" src="/images/flags/zw.svg" alt="Zimbabwe"
                             title="Zimbabwe"> Zimbabwe </a>

                </li>

            </ul>
        </div>
    </section>

</div>

<?php
$this->registerJs("
var qsRegex;

var grid = $('ul#filters').isotope({
    itemSelector: 'li.country',
    layoutMode: 'fitRows',
    filter: function () {
        return qsRegex ? $(this).data('name').match(qsRegex) : true;
    }
});

var quicksearch = $('.quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($(quicksearch).val(), 'gi');
    $(grid).isotope();
}, 200));

function debounce(fn, threshold) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
        clearTimeout(timeout);
        var args = arguments;
        var _this = this;

        function delayed() {
            fn.apply(_this, args);
        }

        timeout = setTimeout(delayed, threshold);
    };
}",
    View::POS_END,
    'yiiOptions'
);
