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

/* componnents/footer/registers.html.twig */
class __TwigTemplate_706ea9c85187345ddc18d0df27f86c06 extends Template
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
        echo "<footer class=\"py-2 text-center text-small bg-secondary text-light\">
    <div class=\"container text-center\">
        <small>
            Desenvolvido por Mateus Ryu Yamaguchi (<date>";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ON_AIR"] ?? null), "YEAR", [], "any", false, false, false, 4), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["OFF_AIR"] ?? null), "YEAR", [], "any", false, false, false, 4), "html", null, true);
        echo "</date>)
        </small>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "componnents/footer/registers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/footer/registers.html.twig", "/shared/httpd/portal/app/views/componnents/footer/registers.html.twig");
    }
}
