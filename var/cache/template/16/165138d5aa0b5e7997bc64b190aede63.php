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

/* form/sample/approveSample.html.twig */
class __TwigTemplate_d28683cb0f72386a8550837c0a0bf662 extends Template
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
        echo "/aprovar\" method=\"post\" class=\"container-fluid bg-white p-0 m-0\">
    <p class=\"mt-2 px-4\">
        Aprovar amostra \"";
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
    <div class=\"form-check px-4\">
        <h5>Marcador</h5>
";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["markers"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["marker"]) {
            // line 8
            echo "        <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"radio\" name=\"marker\" 
                value=\"";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["marker"], "label", [], "any", false, false, false, 10), "html", null, true);
            echo "\" id=\"marker";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["marker"], "label", [], "any", false, false, false, 10), "html", null, true);
            echo "\" ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 10)) {
                echo "checked";
            }
            echo ">
            <label class=\"form-check-label\" for=\"marker";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
            echo "Normal\">
                ";
            // line 12
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["marker"], "value", [], "any", false, false, false, 12)), "html", null, true);
            echo "
            </label>
        </div>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['marker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "     
    </div>
    <div class=\"modal-footer px-4\">
        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancelar</button>
        <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "form/sample/approveSample.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 15,  94 => 12,  90 => 11,  79 => 10,  75 => 8,  58 => 7,  45 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/sample/approveSample.html.twig", "/shared/httpd/portal/app/views/form/sample/approveSample.html.twig");
    }
}
