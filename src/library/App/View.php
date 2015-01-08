<?php
/**
 * Copyright 2014 Bogdan Ghervan
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace library\App;

use \Zend\View\Renderer\RendererInterface;
use \Zend\View\Resolver\ResolverInterface;

/**
 * Implementation of a layout system similar to what other frameworks have.
 *
 * @author      Bogdan Ghervan <bogdan.ghervan@gmail.com>
 * @copyright   2014 Bogdan Ghervan
 * @link        http://github.com/cronkeep/cronkeep
 * @license     http://opensource.org/licenses/Apache-2.0 Apache License 2.0
 */
class View extends \Slim\View
{
    /**
     * Renders template and injects it to the layout file.
     * 
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render($template, $data = null)
    {
        return parent::render($template, $data);
    }
    
    /**
     * Renders template fragment in its own variable scope.
     * 
     * @param string $template
     * @param array $data
     * @return string
     */
    public function partial($template, $data = array())
    {
        $view = new View();
        $view->setTemplatesDirectory($this->getTemplatesDirectory());
        
        return $view->render($template, $data);
    }
}
