<?php
namespace Wwwision\Neos\FrontendLogin\Controller;

use TYPO3\Flow\Mvc\ActionRequest;
use TYPO3\Flow\Security\Authentication\Controller\AbstractAuthenticationController;

/**
 * Controller for displaying login/logout forms and a profile for authenticated users
 */
class LoginController extends AbstractAuthenticationController {

	/**
	 * @return void
	 */
	public function indexAction() {
	}

	/**
	 * @return void
	 */
	public function profileAction() {
		$this->view->assign('account', $this->securityContext->getAccount());
	}

	/**
	 * return void
	 */
	public function logoutAction() {
		parent::logoutAction();
		$this->addFlashMessage('Successfully logged out', 'Logout');
		$this->redirect('index');
	}

	/**
	 * @param ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 * @return string
	 */
	protected function onAuthenticationSuccess(ActionRequest $originalRequest = NULL) {
		$this->addFlashMessage('Successfully logged in', 'Login');
		$this->redirect('profile');
	}
}