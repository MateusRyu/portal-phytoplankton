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

/* patterns/deleteImageModal.html.twig */
class __TwigTemplate_6983453c44a94350de21f4b962a35a47 extends Template
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
        echo "Label\">";
        echo twig_escape_filter($this->env, ($context["modalTitle"] ?? null), "html", null, true);
        echo "</h1>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
        </div>
        <div class=\"modal-body\">
            <p>
                Realmente deseja excluir a imagem? A ação não poderá ser desfeita após realizada. 
                A página será recarregada caso confirme a exclusão.
            </p>
            <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["src"] ?? null), "html", null, true);
        echo "\" class=\"img-thumbnail\" alt=\"Imagem que será excluida.\">
        </div>
        <div class=\"modal-footer\">
            <form action=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["href"] ?? null), "html", null, true);
        echo "\" method=\"post\" >
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
                <button type=\"submit\" class=\"btn btn-danger\">Excluir imagem</button>
            </form>
        </div>
    </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "patterns/deleteImageModal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  60 => 13,  47 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "patterns/deleteImageModal.html.twig", "/shared/httpd/portal/app/views/patterns/deleteImageModal.html.twig");
    }
}
