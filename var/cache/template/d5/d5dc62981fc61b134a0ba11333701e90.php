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

/* componnents/navbar/form.html.twig */
class __TwigTemplate_07f82ac91948e0d0e706b646b7c9b3d0 extends Template
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
        echo "<div class=\"d-flex flex-column flex-shrink-0 bg-light min-vh-100\" style=\"width: 4.5rem;\">
    <ul class=\"nav nav-pills nav-flush flex-column mb-auto text-center\">
        <li class=\"nav-item border-top\">
            <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros\" class=\"nav-link py-3 border-bottom rounded-0\" title=\"Todos\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"home\"></i>
            </a>
        </li>
        <li>
            <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/rascunhos\" class=\"nav-link py-3 border-bottom rounded-0\" title=\"Rascunhos\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"file\"></i>
            </a>
        </li>
        <li>
            <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/em-curadoria\" class=\"nav-link py-3 border-bottom rounded-0\" title=\"Em curadoria\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"send\"></i>
            </a>
        </li>
        <li>
            <a href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/aprovados\" class=\"nav-link py-3 border-bottom rounded-0\" title=\"Aprovado\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"thumbs-up\"></i>
            </a>
        </li>
        <li>
            <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/registros/rejeitados\" class=\"nav-link py-3 border-bottom rounded-0\" title=\"Reprovado\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"thumbs-down\"></i>
            </a>
        </li>
";
        // line 29
        if ((($context["role"] ?? null) == "curador")) {
            // line 30
            echo "        <li>
            <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/curadoria\" class=\"nav-link py-3 border-bottom rounded-0 ";
            echo twig_escape_filter($this->env, ($context["curateActived"] ?? null), "html", null, true);
            echo "\" title=\"Reprovado\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"inbox\"></i>
            </a>
        </li>
";
        }
        // line 36
        if ((($context["role"] ?? null) == "administrador")) {
            // line 37
            echo "        <li>
            <a href=\"";
            // line 38
            echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
            echo "/usuarios\" class=\"nav-link py-3 border-bottom rounded-0 ";
            echo twig_escape_filter($this->env, ($context["adminActived"] ?? null), "html", null, true);
            echo "\" title=\"Gerenciar usuarios\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
                <i data-feather=\"users\"></i>
            </a>
        </li>
";
        }
        // line 43
        echo "    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "componnents/navbar/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 43,  101 => 38,  98 => 37,  96 => 36,  86 => 31,  83 => 30,  81 => 29,  74 => 24,  66 => 19,  58 => 14,  50 => 9,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "componnents/navbar/form.html.twig", "/shared/httpd/portal/app/views/componnents/navbar/form.html.twig");
    }
}
