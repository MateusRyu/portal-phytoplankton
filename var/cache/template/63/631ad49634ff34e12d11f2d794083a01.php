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

/* patterns/sampleCard.html.twig */
class __TwigTemplate_0c5c2ba1d5ad2fa96d1fb30e84b2db00 extends Template
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
        echo "<div class=\"col-md-4\">
    <div class=\"card mb-4 shadow-sm\">
        <div class=\"card-body\">
            <h5>";
        // line 4
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "name", [], "any", false, false, false, 4);
        echo "</h5>
            <div>
";
        // line 6
        $context["text"] = twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "status", [], "any", false, false, false, 6);
        // line 7
        if ((($context["text"] ?? null) == "rascunho")) {
            // line 8
            echo "                ";
            echo twig_include($this->env, $context, "componnents/badges/secondary.html.twig");
            echo "
";
        }
        // line 10
        echo "
";
        // line 11
        if ((($context["text"] ?? null) == "aprovado")) {
            // line 12
            echo "                ";
            echo twig_include($this->env, $context, "componnents/badges/success.html.twig");
            echo "
";
        }
        // line 14
        echo "
";
        // line 15
        if ((($context["text"] ?? null) == "rejeitado")) {
            // line 16
            echo "                <div class=\"alert alert-warning\" role=\"alert\">
                    ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "note", [], "any", false, false, false, 17), "html", null, true);
            echo "
                </div>
                ";
            // line 19
            echo twig_include($this->env, $context, "componnents/badges/danger.html.twig");
            echo "
";
        }
        // line 21
        echo "
";
        // line 22
        if ((($context["text"] ?? null) == "em curadoria")) {
            // line 23
            echo "                    ";
            echo twig_include($this->env, $context, "componnents/badges/warning.html.twig");
            echo "
";
        }
        // line 25
        echo "
";
        // line 26
        if ((($context["text"] ?? null) == "compartilhado")) {
            // line 27
            echo "                    ";
            echo twig_include($this->env, $context, "componnents/badges/info.html.twig");
            echo "
";
        }
        // line 29
        echo "
            </div>
            <p class=\"card-text\">
                Cidade: ";
        // line 32
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "city", [], "any", false, false, false, 32);
        echo "
                <br>
                Latitude: ";
        // line 34
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "latitude", [], "any", false, false, false, 34);
        echo "
                <br>
                Longitude: ";
        // line 36
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "longitude", [], "any", false, false, false, 36);
        echo "
                <br>
                Profundidade: ";
        // line 38
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "depth", [], "any", false, false, false, 38);
        echo " metros
                <br>
                Coletado às ";
        // line 40
        echo twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "colectedAt", [], "any", false, false, false, 40);
        echo "
            </p>
            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"btn-group\">
";
        // line 44
        $context["text"] = twig_capitalize_string_filter($this->env, "excluir");
        // line 45
        $context["link"] = (((((($context["SITE_URL"] ?? null) . "/registros/") . ($context["id"] ?? null)) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 45)) . "/excluir");
        // line 46
        echo "                    ";
        echo twig_include($this->env, $context, "componnents/buttons/linkDanger.html.twig");
        echo "

";
        // line 48
        $context["text"] = twig_capitalize_string_filter($this->env, "editar");
        // line 49
        $context["link"] = (((((($context["SITE_URL"] ?? null) . "/registros/") . ($context["id"] ?? null)) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 49)) . "/editar");
        // line 50
        echo "                    ";
        echo twig_include($this->env, $context, "componnents/buttons/linkSecondary.html.twig");
        echo "

";
        // line 52
        if ((twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "status", [], "any", false, false, false, 52) == "rascunho")) {
            // line 53
            echo "
";
            // line 54
            $context["link"] = (((((($context["SITE_URL"] ?? null) . "/registros/") . ($context["id"] ?? null)) . "/amostra/") . twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 54)) . "/enviar-para-curadoria");
            // line 55
            echo "
";
        } else {
            // line 57
            echo "
";
            // line 58
            $context["link"] = "#";
            // line 59
            $context["disable"] = "disabled";
            // line 60
            echo "
";
        }
        // line 62
        echo "
                    <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-sm btn-outline-primary ";
        echo twig_escape_filter($this->env, ($context["disable"] ?? null), "html", null, true);
        echo "\">
                        Enviar para curadoria
                    </a>
                </div>
            </div>
            <small class=\"text-muted\">
                Última edição: ";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "editedAt", [], "any", false, false, false, 69), "html", null, true);
        echo "
            </small>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "patterns/sampleCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 69,  185 => 63,  182 => 62,  178 => 60,  176 => 59,  174 => 58,  171 => 57,  167 => 55,  165 => 54,  162 => 53,  160 => 52,  154 => 50,  152 => 49,  150 => 48,  144 => 46,  142 => 45,  140 => 44,  133 => 40,  128 => 38,  123 => 36,  118 => 34,  113 => 32,  108 => 29,  102 => 27,  100 => 26,  97 => 25,  91 => 23,  89 => 22,  86 => 21,  81 => 19,  76 => 17,  73 => 16,  71 => 15,  68 => 14,  62 => 12,  60 => 11,  57 => 10,  51 => 8,  49 => 7,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/sampleCard.html.twig", "/shared/httpd/portal/app/views/patterns/sampleCard.html.twig");
    }
}
