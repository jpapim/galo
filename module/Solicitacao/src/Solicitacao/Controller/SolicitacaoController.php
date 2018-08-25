<?php

namespace Solicitacao\Controller;

use Estrutura\Controller\AbstractCrudController;
use Estrutura\Helpers\Cript;
use Zend\View\Model\ViewModel;

class SolicitacaoController extends AbstractCrudController
{
    /**
     * @var \Solicitacao\Service\Solicitacao
     */
    protected $service;

    /**
     * @var \Solicitacao\Form\Solicitacao
     */
    protected $form;

    public function __construct(){
        parent::init();
    }

    public function indexAction()
    {
        return new ViewModel([
            'service' => $this->service,
            'form' => $this->form,
            'controller' => $this->params('controller'),
            'atributos' => array()
        ]);
    }

    public function indexPaginationAction()
    {
        $filter = $this->getFilterPage();

        $camposFilter = [
            '0' => NULL,
            '1' => [
                'filter' => "unidade.nm_unidade LIKE ?",
            ],
            '2' => [
                'filter' => "departamento.nm_departamento LIKE ?",
            ],
            '3' => [
                'filter' => "solicitacao.nm_solicitante LIKE ?",
            ],
            '4' => [
                'filter' => "status.nm_status LIKE ?",
            ],
            '5' => NULL,
        ];


        $paginator = $this->service->getSolicitacaoPaginator($filter, $camposFilter);

        $paginator->setItemCountPerPage($paginator->getTotalItemCount());

        $countPerPage = $this->getCountPerPage(
            current(\Estrutura\Helpers\Pagination::getCountPerPage($paginator->getTotalItemCount()))
        );

        $paginator->setItemCountPerPage($this->getCountPerPage(
            current(\Estrutura\Helpers\Pagination::getCountPerPage($paginator->getTotalItemCount()))
        ))->setCurrentPageNumber($this->getCurrentPage());

        $viewModel = new ViewModel([
            'service' => $this->service,
            'form' => $this->form,
            'paginator' => $paginator,
            'filter' => $filter,
            'countPerPage' => $countPerPage,
            'camposFilter' => $camposFilter,
            'controller' => $this->params('controller'),
            'atributos' => array()
        ]);

        return $viewModel->setTerminal(TRUE);
    }

    public function gravarAction(){
        $this->addSuccessMessage('Registro gravado com sucesso');
        $this->redirect()->toRoute('navegacao', array('controller' => 'solicitacao-solicitacao', 'action' => 'index'));
        return parent::gravar($this->service, $this->form);
    }

    public function cadastroAction()
    {
        return parent::cadastro($this->service, $this->form);
    }

    public function excluirAction()
    {
        return parent::excluir($this->service, $this->form);
    }
}
