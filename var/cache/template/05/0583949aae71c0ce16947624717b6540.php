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

/* templates/registrationForm.html.twig */
class __TwigTemplate_80cd1ffa6780bcb141009bd6e8198339 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'main' => [$this, 'block_main'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-BR\">
    <head>
        ";
        // line 4
        echo twig_include($this->env, $context, "componnents/head/registers.html.twig");
        echo "
        <title> ";
        // line 5
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, ($context["SITE_NAME"] ?? null), "html", null, true);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 7
        echo "    </head>
    <body class=\"bg-dark\">
        ";
        // line 9
        echo twig_include($this->env, $context, "componnents/header/registers.html.twig");
        echo "
        <div class=\"d-flex justify-content-between\">
            ";
        // line 11
        echo twig_include($this->env, $context, "componnents/navbar/form.html.twig");
        echo "
            <main role=\"main\" class=\"container bg-light\">
                <div class=\"container\">
                    ";
        // line 14
        $this->displayBlock('main', $context, $blocks);
        // line 15
        echo "                </div>
            </main>
        </div>
        
        ";
        // line 19
        echo twig_include($this->env, $context, "componnents/footer/registers.html.twig");
        echo "

        ";
        // line 21
        $this->displayBlock('script', $context, $blocks);
        // line 22
        echo "        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\" crossorigin=\"anonymous\"></script>
        <script src=\"https://unpkg.com/feather-icons/dist/feather.min.js\"></script>
        <script>
            feather.replace()
        </script>
  </body>
</html>";
    }

    // line 6
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 14
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 21
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "templates/registrationForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 21,  105 => 14,  99 => 6,  87 => 22,  85 => 21,  80 => 19,  74 => 15,  72 => 14,  66 => 11,  61 => 9,  57 => 7,  55 => 6,  49 => 5,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/registrationForm.html.twig", "/shared/httpd/portal/app/views/templates/registrationForm.html.twig");
    }
}
