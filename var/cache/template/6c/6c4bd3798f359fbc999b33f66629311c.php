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

/* patterns/updateImageModal.html.twig */
class __TwigTemplate_7934973e53b280a07ffc82ae5ee81d9e extends Template
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
        echo "<div class=\"modal fade\" id=\"";
        echo twig_escape_filter($this->env, ($context["modalId"] ?? null), "html", null, true);
        echo "\" tabindex=\"-1\" aria-labelledby=\"";
        echo twig_escape_filter($this->env, ($context["modalId"] ?? null), "html", null, true);
        echo "\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
            <h1 class=\"modal-title fs-5\" id=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["modalId"] ?? null), "html", null, true);
        echo "Label\">
                ";
        // line 6
        echo ($context["modalTitle"] ?? null);
        echo "
            </h1>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <figure class=\"figure\">
                <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["src"] ?? null), "html", null, true);
        echo "\" class=\"figure-img img-fluid rounded\" alt=\"Imagem atual.\">
                <figcaption class=\"figure-caption\">Imagem atual.</figcaption>
            </figure>
            <form action=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["href"] ?? null), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"modal-body\">
                    <div class=\"input-group mb-3\">
                    <input type=\"file\" class=\"form-control\" id=\"fotoLocal\" name=\"image\" accept=\"image/*\">
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
                    <button type=\"submit\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" name=\"registerId\" class=\"btn btn-primary\">Salvar imagem</button>
                </div>
            </form>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "patterns/updateImageModal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 22,  65 => 14,  59 => 11,  51 => 6,  47 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/updateImageModal.html.twig", "/shared/httpd/portal/app/views/patterns/updateImageModal.html.twig");
    }
}
