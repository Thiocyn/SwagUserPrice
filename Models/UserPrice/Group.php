<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\CustomModels\UserPrice;

use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Model\LazyFetchModelEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="s_plugin_pricegroups")
 * @ORM\Entity(repositoryClass="Shopware\CustomModels\UserPrice\Repository")
 */
class Group extends LazyFetchModelEntity
{
    /**
     * The id property is an identifier property which means
     * doctrine associations can be defined over this field.
     *
     * @var integer $id
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Contains the customer price group name value.
     *
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * Flag which indicates a net price.
     *
     * @var integer $gross
     * @ORM\Column(name="gross", type="integer", nullable=false)
     */
    private $gross;

    /**
     * Flag which indicates if a price group is active or not.
     *
     * @var integer $taxInput
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;

    /**
     * INVERSE SIDE
     * @ORM\OneToMany(targetEntity="Shopware\Models\Customer\Customer", mappedBy="priceGroup")
     *
     * @var ArrayCollection
     */
    protected $customers;

    /**
     * INVERSE SIDE
     *
     * @var $prices ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Shopware\CustomModels\UserPrice\Price", mappedBy="priceGroup", cascade={"persist"})
     */
    protected $prices;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getGross()
    {
        return $this->gross;
    }

    /**
     * @param int $gross
     * @return $this
     */
    public function setGross($gross)
    {
        $this->gross = $gross;

        return $this;
    }

    /**
     * @return \Shopware\CustomModels\UserPrice\Group
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
