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

/* componnents/header/registers.html.twig */
class __TwigTemplate_0bea46a34099da397a5de39cfd17eea1 extends Template
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
        echo "<header>
    <nav class=\"navbar navbar-dark bg-dark flex-md-nowrap px-2 py-2 shadow\">
        <a class=\"navbar-brand col-sm-3 col-md-3 mr-0\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "\">
            ";
        // line 4
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "
        </a>
        
        
        <ul class=\"navbar-nav flex flex-row gap-2 px-3\">
            <li class=\"nav-item text-info align-self-center px-1 border-end\">
                ";
        // line 10
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["username"] ?? null)), "html", null, true);
        echo "
            </li>
            <li class=\"nav-item text-info align-self-center px-1 border-end\">
                ";
        // line 13
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, ($context["role"] ?? null)), "html", null, true);
        echo "
            </li>
            <li class=\"nav-item text-nowrap my-auto px-1\">
                <a class=\"nav-link\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/usuario/configuracao\">
                    <i data-feather=\"settings\"></i>
                    Configurações
                </a>
            </li>
            <li class=\"nav-item text-nowrap my-auto\">
                <a class=\"btn btn-sm btn-outline-light\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "\">
                    <i data-feather=\"home\"></i>
                    Página inicial
                </a>
            </li>
            <li class=\"nav-item text-nowrap my-auto\">
                <a class=\"btn btn-sm btn-outline-light\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/logout\">
                    <i data-feather=\"log-out\"></i>
                    Sair
                </a>
            </li>
        </ul>
    </nav>
</header>";
    }

    public function getTemplateName()
    {
        return "componnents/header/registers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 28,  75 => 22,  66 => 16,  60 => 13,  54 => 10,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/header/registers.html.twig", "/shared/httpd/portal/app/views/componnents/header/registers.html.twig");
    }
}
