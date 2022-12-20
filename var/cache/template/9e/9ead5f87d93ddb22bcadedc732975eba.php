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

/* form/sample/basic.html.twig */
class __TwigTemplate_fd749083536fd8ede0d1ca16ca22d154 extends Template
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
        echo "<h4 class=\"mb-3\">Dados básicos</h4>
<div class=\"col-sm-12 mb-2\">
    <label for=\"nomeLocal\" class=\"form-label\">Nome (opcional)</label>
    <input type=\"text\" class=\"form-control\" name=\"nameSample\" id=\"nameSample\" placeholder=\"Nome da região ou do ponto especifico. Ex: Baía Ilha Grande - ponto A\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "name", [], "any", false, false, false, 4), "html", null, true);
        echo "\" maxlength=\"50\">
</div>        
<div class=\"col-sm-12 my-2\">
    <p class=\"h6\">Coordenadas</p>
    <div class=\"input-group mb-2\">
        <span class=\"input-group-text\">Latitude</span>
        <input type=\"number\" class=\"form-control\" name=\"latitude\" id=\"latitude\" placeholder=\"Latitude\" aria-label=\"Latitude\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "latitude", [], "any", false, false, false, 10), "html", null, true);
        echo "\" max=90 min=-90 step=\"0.000001\" onkeyup=\"addGeoData()\" required>
        <span class=\"input-group-text\">Longitude</span>
        <input type=\"number\" class=\"form-control\" name=\"longitude\" id=\"longitude\" placeholder=\"Longitude\" aria-label=\"Longitude\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "longitude", [], "any", false, false, false, 12), "html", null, true);
        echo "\" max=180 min=-180 step=\"0.000001\" onkeyup=\"addGeoData()\" required>
    </div>
</div>
<div class=\"col-sm-12 my-2\">
    <label for=\"city\" class=\"form-label\">Cidade</label>
    <input type=\"text\" class=\"form-control\" id=\"city\" name=\"city\" value=\"";
        // line 17
        echo ((twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "city", [], "any", true, true, false, 17)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "city", [], "any", false, false, false, 17), "Não definido")) : ("Não definido"));
        echo "\" maxlength=\"50\" required>
</div>
<div class=\"col-sm-12 my-2\">
    <label for=\"state\" class=\"form-label\">Estado</label>
    <input type=\"text\" class=\"form-control\" id=\"state\" name=\"state\" value=\"";
        // line 21
        echo ((twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "state", [], "any", true, true, false, 21)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "state", [], "any", false, false, false, 21), "Não definido")) : ("Não definido"));
        echo "\" maxlength=\"50\" required>
</div>
<div class=\"col-sm-12 my-2\">
    <label for=\"country\" class=\"form-label\">País</label>
    <input type=\"text\" class=\"form-control\" id=\"country\" name=\"country\" value=\"";
        // line 25
        echo ((twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "country", [], "any", true, true, false, 25)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "country", [], "any", false, false, false, 25), "Não definido")) : ("Não definido"));
        echo "\" maxlength=\"50\" required>
</div>
<div class=\"col-sm-12 my-2\">
    <label for=\"profunfidade\" class=\"form-label\">Profundidade (metros)</label>
    <input type=\"number\" class=\"form-control\" id=\"profunfidade\" name=\"profunfidade\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "depth", [], "any", false, false, false, 29), "html", null, true);
        echo "\" min=0 max=99999.99 step=\"0.01\" required>
</div>
<div class=\"col-sm-12 my-2\">
    <label for=\"data\"  class=\"form-label\">Momento da coleta</label>
    <input class=\"form-control\" id=\"data\" type=\"datetime-local\" name=\"data\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "colectedAt", [], "any", false, false, false, 33), "html", null, true);
        echo "\" required />
</div>

<div class=\"col-sm-12 my-2\">
    <p class=\"h6\">Fotos do local (opcional)</p>  
";
        // line 38
        if (twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "coverPath", [], "any", false, false, false, 38)) {
            // line 39
            echo "    <div class=\"d-flex justify-content-start\">
        <div class=\"position-relative\">
            <img src=\"";
            // line 41
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "coverPath", [], "any", false, false, false, 41), "html", null, true);
            echo "\" class=\"mx-auto\" alt=\"Foto do local\" height=\"450px\" width=\"600px\">
            <div class=\"position-absolute top-0 end-0 btn-group\">
                <button class=\"btn btn-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    Opções 
                </button>
                <ul class=\"dropdown-menu dropdown-menu-dark\">
                    <li>
                        <button type=\"button\" class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target=\"#updateCover\">
                            Alterar
                        </button>
                    </li>
                    <li>
                        <button type=\"button\" class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteCover\">
                            Excluir
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
        } else {
            // line 62
            echo "    <div class=\"input-group mb-3\">
        <input type=\"file\" class=\"form-control\" id=\"fotoLocal\" name=\"fotoLocal\" accept=\"image/*\" onchange=\"validateSize(this, 5)\">
    </div>
";
        }
        // line 66
        echo "</div>
<script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js\" integrity=\"sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js\" integrity=\"sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V\" crossorigin=\"anonymous\"></script>";
    }

    public function getTemplateName()
    {
        return "form/sample/basic.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 66,  131 => 62,  106 => 41,  102 => 39,  100 => 38,  92 => 33,  85 => 29,  78 => 25,  71 => 21,  64 => 17,  56 => 12,  51 => 10,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/sample/basic.html.twig", "/shared/httpd/portal/app/views/form/sample/basic.html.twig");
    }
}
