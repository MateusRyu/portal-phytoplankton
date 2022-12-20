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

/* form/sample/disapproveSample.html.twig */
class __TwigTemplate_053516a099804395d68d683eacc3fb56 extends Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/amostra/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 1), "html", null, true);
        echo "/rejeitar\" method=\"post\" class=\"container bg-white p-0 m-0\">
    <p class=\"mt-2 px-4\">
        Rejeitar amostra \"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "register", [], "any", false, false, false, 3), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "name", [], "any", false, false, false, 3), "html", null, true);
        echo "\" de ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "author", [], "any", false, false, false, 3), "html", null, true);
        echo " (ID: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "authorId", [], "any", false, false, false, 3), "html", null, true);
        echo ")?
    </p>
    <div class=\"mb-3 px-4\">
        <label for=\"feedback\" class=\"form-label\">Feedback</label>
        <input name=\"feedback\" class=\"form-control\" list=\"commonAnswers\" id=\"feedback\" placeholder=\"Informe o motivo para rejeitar.\" required></input>
    </div>
    <div class=\"modal-footer px-4\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancelar</button>
        <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "form/sample/disapproveSample.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/sample/disapproveSample.html.twig", "/shared/httpd/portal/app/views/form/sample/disapproveSample.html.twig");
    }
}
