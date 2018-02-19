<?php

App::uses('Controller', 'Controller');

class FaqsController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();

		$allowArr = array(
			"index",
		);
		$this->Auth->allow($allowArr);
	}

	public function admin_index($topic_id)
	{
		$this->set('title', 'Manage FAQ\'s Topics');
		$this->set('topic_id', $topic_id);
	}

	public function admin_faq_data($topic_id)
	{
		$this->layout = 'ajax';
		$request = $this->request;
		$data = $request->data;

		$start = $data['start'];
		$limit = $data['length'];

		$colName = $request->data['order'][0]['column'];
		$orderby[$request->data['columns'][$colName]['name']] = $request->data['order'][0]['dir'];

		$condition = array();
		$condition['Faq.status !='] = 2;
		$condition['Faq.faq_topic_id'] = $topic_id;

		if (isset($request->data['columns']))
		{
			foreach ($request->data['columns'] as $column)
			{
				if (isset($column['searchable']) && $column['searchable'] == 'true')
				{
					if (isset($column['name']) && $column['search']['value'] != '')
					{
						$condition[$column['name'] . ' LIKE '] = '%' . filter_var($column['search']['value']) . '%';
					}
				}
			}
		}

		$query = $this->Faq->find('all', array(
			'conditions' => $condition,
			'fields' => array('id', 'question', 'answer', 'status'),
			'order' => $orderby,
			'limit' => $limit,
			'start' => $start + 1
		));

		$dataResult = [];
		$totalRecords = count($query);
		$sr_no = $start * $limit;
		foreach ($query as $row)
		{
			$d['sr_no'] = ++$sr_no;
			$d['id'] = $row['Faq']['id'];
			$d['name'] = $row['Faq']['question'];
			$d['manage'] = $row['Faq']['answer'];
			$d['status'] = $row['Faq']['status'];
			$dataResult[] = $d;
		}

		$returnData = [
			'draw' => $data['draw'],
			'recordsTotal' => $totalRecords,
			'recordsFiltered' => $totalRecords,
			'data' => $dataResult
		];
		echo json_encode($returnData);
		exit;
	}

	public function admin_add($topic_id)
	{
		$this->set('title', 'Add Question');
		$request = $this->request;

		if ($request->is('post') && !empty($request->data))
		{
			if ($this->Faq->save($request->data))
			{
				$this->Session->setFlash(__('Faq question has been added.'), 'success');
				return $this->redirect(array('action' => 'index', $topic_id));
			}
			$this->Session->setFlash(__('Unable to add your faq qaestion.'), 'error');
		}

		$this->set('topic_id', $topic_id);
	}

	public function admin_edit($id = null)
	{
		$this->set('title', 'Edit Question');
		$request = $this->request;
		$IS_VALID = false;

		if (!empty($id) && ctype_digit($id))
		{

			$faqData = $this->Faq->find('first', array(
				'conditions' => array(
					'status !=' => 2, 'id' => $id
				)
			));

			if ($request->is(['post', 'put']) && !empty($request->data))
			{
				if ($this->Faq->save($request->data))
				{
					$this->Session->setFlash(__('Faq question has been updated.'), 'success');
					return $this->redirect(array('action' => 'index', $request->data['Faq']['faq_topic_id']));
				}
				$this->Session->setFlash(__('Unable to update your Faq question .'), 'error');
			}


			if (!empty($faqData))
			{
				$IS_VALID = true;

				//prd($result);
				$this->set(compact('faqData'));
				$this->request->data = $faqData;
			}
		}

		if (!$IS_VALID)
		{
			$this->Flash->error(__("Invalid request Id."));
			$this->redirect(['action' => 'index']);
		}
	}

	public function admin_updateStatus()
	{
		$requset = $this->request;
		if ($requset->is('ajax'))
		{
			$data = $requset->data;

			$data['Faq']['id'] = $this->request->data['id'];
			$data['Faq']['status'] = $this->request->data['status'] == 1 ? 0 : 1;
			//prd($this->User->validates($data));
			if ($this->Faq->save($data, array('validate' => false)))
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
			exit;
		}
		else
		{
			$this->render('/Admin/nodirecturl');
		}
	}

	public function admin_delete()
	{
		$request = $this->request;
		if ($request->is('ajax'))
		{
			$data = array();
			if (isset($request->data['id']))
			{
				$data['Faq']['id'] = $request->data['id'];
				$data['Faq']['status'] = '2';
				if ($this->Faq->save($data))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
			exit;
		}
		else
		{
			$this->render('/Admin/nodirecturl');
		}
	}

	/* =====  FAQ TOPIC SECTION  ===== */

	public function admin_topic()
	{
		$this->set('title', 'FAQ\'s Topics');
	}

	public function admin_faqtopic_data()
	{
		$this->loadModel('FaqTopic');
		$this->layout = 'ajax';
		$request = $this->request;
		$data = $request->data;

		$start = $data['start'];
		$limit = $data['length'];

		$colName = $request->data['order'][0]['column'];
		$orderby[$request->data['columns'][$colName]['name']] = $request->data['order'][0]['dir'];

		$condition = array();
		$condition['FaqTopic.status !='] = 2;

		if (isset($request->data['columns']))
		{
			foreach ($request->data['columns'] as $column)
			{
				if (isset($column['searchable']) && $column['searchable'] == 'true')
				{
					if (isset($column['name']) && $column['search']['value'] != '')
					{
						$condition[$column['name'] . ' LIKE '] = '%' . filter_var($column['search']['value']) . '%';
					}
				}
			}
		}

		$query = $this->FaqTopic->find('all', array(
			'conditions' => $condition,
			'fields' => array('id', 'name', 'status'),
			'order' => $orderby,
			'limit' => $limit,
			'start' => $start + 1
		));

		$dataResult = [];
		$totalRecords = count($query);
		$sr_no = $start * $limit;
		foreach ($query as $row)
		{
			$d['sr_no'] = ++$sr_no;
			$d['id'] = $row['FaqTopic']['id'];
			$d['name'] = $row['FaqTopic']['name'];
			$d['manage'] = $row['FaqTopic']['id'];
			$d['status'] = $row['FaqTopic']['status'];
			$dataResult[] = $d;
		}

		$returnData = [
			'draw' => $data['draw'],
			'recordsTotal' => $totalRecords,
			'recordsFiltered' => $totalRecords,
			'data' => $dataResult
		];
		echo json_encode($returnData);
		exit;
	}

	public function admin_topic_add()
	{
		$this->set('title', 'Add Topic');
		$this->loadModel("FaqTopic");
		$request = $this->request;

		if ($request->is('post') && !empty($request->data))
		{
			if ($this->FaqTopic->save($request->data))
			{
				$this->Session->setFlash(__('Faq topic has been added.'));
				return $this->redirect(array('action' => 'topic'));
			}
			$this->Session->setFlash(__('Unable to add your faq topic.'));
		}
	}

	public function admin_topic_edit($id = null)
	{
		$this->set('title', 'Edit Topic');
		$this->loadModel("FaqTopic");
		$request = $this->request;
		$IS_VALID = false;

		if (!empty($id) && ctype_digit($id))
		{

			$faqTopicData = $this->FaqTopic->find('first', array(
				'conditions' => array(
					'status !=' => 2, 'id' => $id
				)
			));

			if ($request->is(['post', 'put']) && !empty($request->data))
			{
				if ($this->FaqTopic->save($request->data))
				{
					$this->Session->setFlash(__('Faq topic has been updated.'));
					return $this->redirect(array('action' => 'topic'));
				}
				$this->Session->setFlash(__('Unable to update your Faq topic .'));
			}


			if (!empty($faqTopicData))
			{
				$IS_VALID = true;

				$this->set(compact('faqTopicData'));
				$this->request->data = $faqTopicData;
			}
		}

		if (!$IS_VALID)
		{
			$this->Flash->error(__("Invalid request Id."));
			$this->redirect(['action' => 'topic']);
		}
	}

	public function admin_updateTopicStatus()
	{
		$this->loadModel("FaqTopic");
		$requset = $this->request;
		if ($requset->is('ajax'))
		{
			$data = $requset->data;

			$data['FaqTopic']['id'] = $this->request->data['id'];
			$data['FaqTopic']['status'] = $this->request->data['status'] == 1 ? 0 : 1;
			//prd($this->User->validates($data));
			if ($this->FaqTopic->save($data, array('validate' => false)))
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
			exit;
		}
		else
		{
			$this->render('/Admin/nodirecturl');
		}
	}

	public function admin_deletetopic()
	{
		$this->loadModel("FaqTopic");
		$request = $this->request;
		if ($request->is('ajax'))
		{
			$data = array();
			if (isset($request->data['id']))
			{
				$data['FaqTopic']['id'] = $request->data['id'];
				$data['FaqTopic']['status'] = '2';
				if ($this->FaqTopic->save($data))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
			exit;
		}
		else
		{
			$this->render('/Admin/nodirecturl');
		}
	}

	public function index()
	{
		$this->loadModel("FaqTopic");
		
		$this->FaqTopic->bindModel(array("hasMany" => array(
				"Faq" => array(
					'className' => 'Faq',
					'foreignKey' => 'faq_topic_id',
					'conditions' => array('Faq.status' => '1'),
					'order' => array('Faq.index_order ASC')
				))
		));

		$FaqList = $this->FaqTopic->find('all', array(
			'recursive' => 1,
			'conditions' => array("FaqTopic.status" => 1),
			'order' => array('FaqTopic.index_order ASC')
		));
		//prd($FaqList);
		$this->set("FaqList", $FaqList);
	}

}
