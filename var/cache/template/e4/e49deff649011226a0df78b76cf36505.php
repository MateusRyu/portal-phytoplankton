<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* patterns/popupInfo.html.twig */
class __TwigTemplate_31d597e82a4365b8771313e00690ef38 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<section id=\"popup\" class=\"ol-popup d-none  border-end border-3 border-white\" style=\"overflow-y: auto;\">
    <img id=\"popup-image\" class=\"placeholder img-fluid card-img-top w-100 bg-dark\" width=\"400\"
height=\"300\" alt=\"Foto do local\">
    <button onclick=\"closePopup()\" id=\"popup-closer\" class=\"btn btn-close btn-outline-secondary position-absolute top-0 end-0 m-2 p-2\"></button>
    <div class=\"m-2 p-2\">
        <h2 id=\"popup-title\" class=\"h4\">
            <span class=\"placeholder col-4 bg-dark\"></span>
            <span class=\"placeholder col-1 bg-dark\"></span>
            <span class=\"placeholder col-3 bg-dark\"></span>
        </h2>
        <h3 id=\"popup-subtitle\" class=\"h5\">
            <span class=\"placeholder col-3 bg-dark\"></span>
            <span class=\"placeholder col-1 bg-dark\"></span>
            <span class=\"placeholder col-4 bg-dark\"></span>
        </h3>
    </div>
    <div id=\"popup-content\">
        <ul class=\"d-flex gap-1 flex-column p-2 border-top border-1 \">
            <li>
                <i data-feather=\"map\"></i>
                <span id='popup-localization'>
                    <span class=\"placeholder col-3 bg-info\"></span>
                    <span class=\"placeholder col-4 bg-info\"></span>
                </span>
            </li>
            <li>
                <i data-feather=\"map-pin\"></i>
                <span id='popup-coordinates'>
                    <span class=\"placeholder col-3 bg-info\"></span>
                    <span class=\"placeholder col-4 bg-info\"></span>
                </span>
            </li>
            <li>
                <i data-feather=\"chevrons-down\"></i>
                <span id=\"popup-depth\">
                    <span class=\"placeholder col-1 bg-info\"></span>
                    <span class=\"placeholder col-2 bg-info\"></span>                            
                </span>
            </li>
            <li>
                <i data-feather=\"calendar\"></i>
                <span id=\"popup-collectedAt\">
                    <span class=\"placeholder col-3 bg-info\"></span>
                    <span class=\"placeholder col-3 bg-info\"></span>
                </span>
            </li>
            <li>
                <i data-feather=\"paperclip\"></i>
                <button type=\"button\" class=\"btn btn-sm btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
                    Exibir descrição da coleta
                </button>
            </li>
        </ul>
        <hr>

        ";
        // line 57
        echo "        <div id=\"phytoplanktonImages\" class=\"carousel slide\" data-bs-ride=\"true\">
            <div id=\"phytoplanktonImages-indicators\" class=\"carousel-indicators\"></div>
            <div id=\"phytoplanktonImages-inner\" class=\"carousel-inner\"></div>
            <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#phytoplanktonImages\" data-bs-slide=\"prev\">
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Previous</span>
            </button>
            <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#phytoplanktonImages\" data-bs-slide=\"next\">
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                <span class=\"visually-hidden\">Next</span>
            </button>
        </div>  
";
        // line 70
        echo "
        <hr>
        <h5 class=\"p-2\">Contagem de táxons</h5>
        <table class=\"p-2 mx-2 border-top border-1 table caption-top table-striped-columns\">
            <caption>
                Unidade de medida: <span id=\"taxonMeasure\"><span class=\"placeholder col-3\"></span></span>
            </caption>
            <thead>
                <tr>
                    <td scope=\"col\">Táxon</td>
                    <th scope=\"col\">Média</th>
                    <th scope=\"col\">Máxima</th>
                </tr>
            </thead>
            <tbody id=\"popup-fitoplancton\">
                <tr>
                    <th scope=\"row\"><span class=\"placeholder col-4\"></span></th>
                    <td><span class=\"placeholder col-3\"></span></td>
                    <td><span class=\"placeholder col-3\"></span></td>
                </tr>
                <tr>
                    <th scope=\"row\"><span class=\"placeholder col-4\"></span></th>
                    <td><span class=\"placeholder col-3\"></span></td>
                    <td><span class=\"placeholder col-3\"></span></td>
                </tr>
                <tr>
                    <th scope=\"row\"><span class=\"placeholder col-4\"></span></th>
                    <td><span class=\"placeholder col-3\"></span></td>
                    <td><span class=\"placeholder col-3\"></span></td>
                </tr>
            </tbody>
        </table>
            
        <ul id=\"popup-info\" class=\"p-2\">
            <h5>Dados auxiliares</h5>
            <li>
                <span class=\"placeholder col-4\"></span>
                <span class=\"placeholder col-2\"></span>
                <span class=\"placeholder col-2\"></span>
            </li>
                <li>
                <span class=\"placeholder col-5\"></span>
                <span class=\"placeholder col-3\"></span>
                <span class=\"placeholder col-1\"></span>
            </li>
                <li>
                <span class=\"placeholder col-4\"></span>
                <span class=\"placeholder col-2\"></span>
            </li>
        </ul>
        <div class=\"border-top border-1 p-2\">
            <p>
                <i data-feather=\"info\"></i>
                <span id='popup-reference'>
                    <span class=\"placeholder col-4 bg-info\"></span>
                    <span class=\"placeholder col-4 bg-info\"></span>
                </span>
            </p>
            <small class=\"p-2 \" style=\"font-size: .8em\">
                Última edição: <span id=\"popup-lastUpdate\">
                    <span class=\"placeholder col-3\"></span>
                    <span class=\"placeholder col-3\"></span>
                </span>
            </small>
        </div>
    </div>
</section>

<!-- Modal -->
<div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-scrollable modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Descrição da coleta</h1>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <span id=\"popup-description\">
                    <span class=\"placeholder col-3 bg-dark\"></span>
                    <span class=\"placeholder col-1 bg-dark\"></span>
                    <span class=\"placeholder col-4 bg-dark\"></span>
                    <span class=\"placeholder col-3 bg-dark\"></span>
                    <span class=\"placeholder col-1 bg-dark\"></span>
                    <span class=\"placeholder col-4 bg-dark\"></span>
                    <span class=\"placeholder col-3 bg-dark\"></span>
                    <span class=\"placeholder col-1 bg-dark\"></span>
                    <span class=\"placeholder col-4 bg-dark\"></span>
                </span>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "patterns/popupInfo.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  108 => 70,  94 => 57,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/popupInfo.html.twig", "/shared/httpd/portal/app/views/patterns/popupInfo.html.twig");
    }
}
