<?php

namespace Acme\UserBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;

class UserAdmin extends BaseUserAdmin
{
    /**
     * Default values to the datagrid
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1,
        '_per_page' => 25,
        '_sort_by' => 'username',
        '_sort_order' => 'ASC',
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('User Data')
            ->add('username', null, array('label' => 'User Name'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username', null, array('label' => 'User Name'))
            ->add('enabled', null, array('editable' => true))
            ->add('visible', null, array('editable' => true,'label' => 'Visible'))
            ->add('locale', null, array('label' => 'Locale'))
            ->add('createdAt')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                ),
                'label' => "Actions"
            ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Datos del usuario')
            ->add('username', null, array('label' => 'User Name'))
            ->add('locale')
            ->add('createdAt', null, array('label' => 'Created At'))
            ->add('updatedAt', null, array('label' => 'Updated At'))
            ->add('lastLogin', null, array('label' => 'Last Login'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
            ->add('username')
            ->add('enabled', null, array('label' => 'Enabled'))
            ->add('visible', null, array('label' => 'Visible'))
            ->add('locale', null, array('label' => 'Locale'))
        ;

    }
}