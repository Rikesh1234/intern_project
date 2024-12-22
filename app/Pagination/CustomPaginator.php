<?php


namespace App\Pagination;

use Illuminate\Pagination\BootstrapThreePresenter;

class CustomPaginator extends BootstrapThreePresenter
{
    // You can customize the rendering of the pagination links here
    // For example, you can override the render method
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<nav aria-label="%s"><ul class="pagination">%s %s %s</ul></nav>',
                __('Pagination Navigation'),
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

    // You can also override other methods for further customization
}