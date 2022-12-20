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

/* form/sample/manual.html.twig */
class __TwigTemplate_971a33c8fbc78d11113d9886f7df153f extends Template
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
        echo "<h4 class=\"mb-3\">Contagem dos táxon</h4>
<div class=\"my-4\">
    <h4 class=\"mb-3\">Táxon</h4>
    <div class=\"row g-3\">
        <div class=\"col\">
            <div class=\"row mb-3\">
                <label for=\"measure\" class=\"col-md-4 col-form-label\">Unidade de medida: </label>
                <div class=\"col-md-6\">
                    <select id=\"measure\" name=\"measure\" class=\"form-select form-select-sm\" aria-label=\".form-select-sm example\" onchange=\"updateMeasure(this)\">
                        <option value=\"-----\" ";
        // line 10
        if ( !twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 10)) {
            echo "selected";
        }
        echo ">----------</option>
";
        // line 11
        if (($context["taxonUnits"] ?? null)) {
            // line 12
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["taxonUnits"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 13
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "sampleId", [], "any", false, false, false, 13), "html", null, true);
                echo "\" ";
                if ((twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "id", [], "any", false, false, false, 13) == twig_get_attribute($this->env, $this->source, $context["taxon"], "sampleId", [], "any", false, false, false, 13))) {
                    echo "selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "measure", [], "any", false, false, false, 13);
                echo " (";
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "unit", [], "any", false, false, false, 13);
                echo ")</option>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 16
        echo "                    </select>
                    <datalist id=\"taxonUnits\">
                        <option label=\"----------\" value=\"-----\">
";
        // line 19
        if (($context["taxonUnits"] ?? null)) {
            // line 20
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["taxonUnits"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 21
                echo "                        <option label=\"";
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "unit", [], "any", false, false, false, 21);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "sampleId", [], "any", false, false, false, 21), "html", null, true);
                echo "\">
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 24
        echo "                    </datalist>
                </div>
            </div>
        </div>
        <div class=\"col\">
            <div class=\"row mb-3\">
                <label for=\"newMeasure\" class=\"col-md-1 col-form-label\">Outro: </label>
                <div class=\"col-md-8\">
                    ";
        // line 32
        $context["measureUnit"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 32), "measure", [], "any", false, false, false, 32) . ", ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 32), "unit", [], "any", false, false, false, 32));
        // line 33
        echo "                    <input type=\"text\" value=\"";
        echo ($context["measureUnit"] ?? null);
        echo "\" class=\"form-control\" onkeyup=\"updateMeasure(this)\" name=\"newMeasure\" id=\"newMeasure\" placeholder=\"Nome, unidade. Ex: 'Densidade, cél/L'\" maxlength=\"30\">
                </div>
            </div>
        </div>
    </div>
    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">Táxon</th>
                <th scope=\"col\">Quantidade média (<span id=\"labelUnidadeFitoplanctonMedia\">
";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 43)) {
            // line 44
            echo "                        ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 44), "unit", [], "any", false, false, false, 44);
            echo "
";
        } else {
            // line 46
            echo "                        -----
";
        }
        // line 48
        echo "                    </span>)
                </th>
                <th scope=\"col\">Quantidade máxima  (<span id=\"labelUnidadeFitoplanctonMaxima\">
";
        // line 51
        if (twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 51)) {
            // line 52
            echo "                        ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "measureUnit", [], "any", false, false, false, 52), "unit", [], "any", false, false, false, 52);
            echo "
";
        } else {
            // line 54
            echo "                        -----
";
        }
        // line 56
        echo "                    </span>)
                </th>
                <th scope=\"col\">Imagem (opcional)</th>
                <th scope=\"col\">Excluir</th>
            </tr>
        </thead>
        <tbody id=\"fitoplancton\">
";
        // line 63
        if (twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "fitoplancton", [], "any", false, false, false, 63)) {
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "fitoplancton", [], "any", false, false, false, 64));
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 65
                echo "            <tr>
                <td class=col><input type=\"text\" value=\"";
                // line 66
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "name", [], "any", false, false, false, 66);
                echo "\" maxlength=\"50\" name=\"currentTaxon_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 66), "html", null, true);
                echo "\" id=\"currentTaxon_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 66), "html", null, true);
                echo "\" placeholder=\"Nome\" list=\"taxon\" required></td>
                <td><input type=\"number\" value=\"";
                // line 67
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "mean", [], "any", false, false, false, 67);
                echo "\" step=\"0.01\" min=0 max=99999999.99 placeholder=\"Média\" name=\"currentMean_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 67), "html", null, true);
                echo "\" id=\"currentMean_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 67), "html", null, true);
                echo "\" required></td>
                <td><input type=\"number\" value=\"";
                // line 68
                echo twig_get_attribute($this->env, $this->source, $context["taxon"], "max", [], "any", false, false, false, 68);
                echo "\" step=\"0.01\" min=0 max=99999999.99 placeholder=\"Máximo\" name=\"currentMax_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 68), "html", null, true);
                echo "\" id=\"currentMax_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 68), "html", null, true);
                echo "\" required></td>
                <td>
";
                // line 70
                if (twig_get_attribute($this->env, $this->source, $context["taxon"], "image", [], "any", false, false, false, 70)) {
                    // line 71
                    echo "
                    <div class=\"d-flex justify-content-start\">
                        <div class=\"position-relative\">
                            <img src=\"";
                    // line 74
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "image", [], "any", false, false, false, 74), "html", null, true);
                    echo "\" class=\"mx-auto\" alt=\"Foto do local\" height=\"150px\" width=\"200px\">
                            <div class=\"position-absolute top-0 end-0 btn-group\">
                                <button class=\"btn btn-secondary btn-sm dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                    Opções 
                                </button>
                                <ul class=\"dropdown-menu dropdown-menu-dark\">
                                    <li>
                                        <button type=\"button\" class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target=\"#updateImage_";
                    // line 81
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 81), "html", null, true);
                    echo "\">
                                            Alterar
                                        </button>
                                    </li>
                                    <li>
                                        <button type=\"button\" class=\"dropdown-item\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteImage_";
                    // line 86
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 86), "html", null, true);
                    echo "\">
                                            Excluir
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
";
                } else {
                    // line 95
                    echo "                    <input type=\"file\" name=\"currentImage_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 95), "html", null, true);
                    echo "\" id=\"currentImage_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 95), "html", null, true);
                    echo "\" accept=\"image/*\" onchange=\"validateSize(this, 5)\">
";
                }
                // line 96
                echo " ";
                // line 97
                echo "                </td>
                <td>
                    <input name=\"deleteFitoplancton_";
                // line 99
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 99), "html", null, true);
                echo "\" type=\"checkbox\" class=\"form-check-input mt-0\" value=\"\" aria-label=\"Excluir dados deste taxon\">
                </td>
            </tr>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo " ";
        } else {
            // line 103
            echo " ";
            // line 104
            echo "            <tr>
                <td class=col><input type=\"text\" maxlength=\"50\" name=\"taxon_0\" id=\"taxon_0\" placeholder=\"Nome\" list=\"taxon\" required></td>
                <td><input type=\"number\" step=\"0.01\" min=0 max=99999999.99 placeholder=\"Média\" name=\"mean_0\" id=\"mean_0\" required></td>
                <td><input type=\"number\" step=\"0.01\" min=0 max=99999999.99 placeholder=\"Máximo\" name=\"max_0\" id=\"max_0\" required></td>
                <td><input type=\"file\" name=\"image_0\" id=\"image_0\" accept=\"image/*\" onchange=\"validateSize(this, 5)\"></td>
                <td><button class=\"invisible\">X</button></td>
            </tr>
";
        }
        // line 112
        echo "        </tbody>
    </table>
    <datalist id=\"taxon\">
";
        // line 115
        if (($context["taxon"] ?? null)) {
            // line 116
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["taxon"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                // line 117
                echo "        <option value=\"";
                echo $context["name"];
                echo "\">
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 120
        echo "
    </datalist>
    <button type=\"button\" class=\"btn btn-primary\" onclick=\"addInput('fitoplancton')\">Adicionar táxon</button>
</div>
<hr>
<div class=\"my-4\">
    <h4 class=\"mb-3\">
        Variáveis auxiliares (opcional)
    </h4>
    <table class=\"table table-striped\">
        <thead>
            <tr>
                <th scope=\"col\">Nome</th>
                <th scope=\"col\">Valor</th>
                <th scope=\"col\">Unidade de medida</th>
                <th scope=\"col\">Excluir</th>
            </tr>
        </thead>
        <tbody id=\"auxiliar\">
";
        // line 139
        if (twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "context", [], "any", false, false, false, 139)) {
            // line 140
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["sample"] ?? null), "context", [], "any", false, false, false, 140));
            foreach ($context['_seq'] as $context["_key"] => $context["context"]) {
                // line 141
                echo "            <tr>
                <td>
                    <input type=\"text\" value=\"";
                // line 143
                echo twig_get_attribute($this->env, $this->source, $context["context"], "name", [], "any", false, false, false, 143);
                echo "\" name=\"currentName_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 143), "html", null, true);
                echo "\" id=\"currentName_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 143), "html", null, true);
                echo "\" list=\"dataName\" placeholder=\"Nome. Ex: salinidade da água\">
                </td>
                <td>
                    <input type=\"text\" value=\"";
                // line 146
                echo twig_get_attribute($this->env, $this->source, $context["context"], "value", [], "any", false, false, false, 146);
                echo "\" name=\"currentValue_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 146), "html", null, true);
                echo "\" id=\"currentValue_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 146), "html", null, true);
                echo "\" placeholder=\"Valor encontrado. Ex: 35,3\">
                </td>
                <td>
                    <input type=\"text\" name=\"currentUnit_";
                // line 149
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 149), "html", null, true);
                echo "\" id=\"currentUnit_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 149), "html", null, true);
                echo "\" list=\"dataUnit\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["context"], "measure", [], "any", false, false, false, 149);
                echo "\" placeholder=\"Unidade de medida. Ex: g/kg\">
                </td>
                <td>
                    <input name=\"deleteContext_";
                // line 152
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 152), "html", null, true);
                echo "\" id=\"deleteContext_";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["context"], "id", [], "any", false, false, false, 152), "html", null, true);
                echo "\" type=\"checkbox\" class=\"form-check-input mt-0\" value=\"\" aria-label=\"Excluir dados deste taxon\">
                </td>
            </tr>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['context'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 157
        echo "        </tbody>
    </table>
    <datalist id=\"dataName\">
";
        // line 160
        if (($context["dataNames"] ?? null)) {
            // line 161
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["dataNames"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                // line 162
                echo "        <option value=\"";
                echo $context["name"];
                echo "\">
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 165
        echo "    </datalist>
    <datalist id=\"dataUnit\">
        
";
        // line 168
        if (($context["dataUnits"] ?? null)) {
            // line 169
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["dataUnits"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["unit"]) {
                // line 170
                echo "        <option value=\"";
                echo $context["unit"];
                echo "\">
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unit'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 173
        echo "
    </datalist>
    <button type=\"button\" class=\"btn btn-primary\" onclick=\"addInput('auxiliar')\">
        Adicionar variável auxiliar
    </button>

    <hr class=\"my-4 my-4\">
    <button id=\"submitButton\" class=\"btn btn-primary btn-lg\" type=\"submit\" onclick=\"beforeSubmit();\">
        <span id=\"spinner\" class=\"spinner-border spinner-border-sm d-none\" role=\"status\" aria-hidden=\"true\"></span>
        <a id=\"submitButtonText\">Salvar coleta</a>
    </button>
</div>";
    }

    public function getTemplateName()
    {
        return "form/sample/manual.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 173,  405 => 170,  401 => 169,  399 => 168,  394 => 165,  384 => 162,  380 => 161,  378 => 160,  373 => 157,  360 => 152,  350 => 149,  340 => 146,  330 => 143,  326 => 141,  322 => 140,  320 => 139,  299 => 120,  289 => 117,  284 => 116,  282 => 115,  277 => 112,  267 => 104,  265 => 103,  262 => 102,  252 => 99,  248 => 97,  246 => 96,  238 => 95,  226 => 86,  218 => 81,  208 => 74,  203 => 71,  201 => 70,  192 => 68,  184 => 67,  176 => 66,  173 => 65,  169 => 64,  167 => 63,  158 => 56,  154 => 54,  148 => 52,  146 => 51,  141 => 48,  137 => 46,  131 => 44,  129 => 43,  115 => 33,  113 => 32,  103 => 24,  91 => 21,  86 => 20,  84 => 19,  79 => 16,  61 => 13,  56 => 12,  54 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form/sample/manual.html.twig", "/shared/httpd/portal/app/views/form/sample/manual.html.twig");
    }
}
