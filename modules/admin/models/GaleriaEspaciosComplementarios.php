<?php

/**
 * This is the model class for table "galeria_espacios_complementarios".
 *
 * The followings are the available columns in table 'galeria_espacios_complementarios':
 * @property integer $idgaleria
 * @property string $titulo
 * @property string $titulo_seo
 * @property string $descripcion
 * @property string $materiales
 * @property integer $prioridad
 * @property integer $activo
 * @property string $created
 * @property string $modified
 */
class GaleriaEspaciosComplementarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GaleriaEspaciosComplementarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'galeria_espacios_complementarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, titulo_seo, descripcion, materiales, activo, created, modified', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('titulo, titulo_seo, materiales', 'length', 'max'=>45),
			array('prioridad', 'default', 'setOnEmpty' => true, 'value' => NULL),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idgaleria, titulo, titulo_seo, descripcion, materiales, activo, created, modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idgaleria' => 'Idgaleria',
			'titulo' => 'Titulo',
			'titulo_seo' => 'Titulo Seo',
			'descripcion' => 'Descripcion',
			'materiales' => 'Materiales',
			'prioridad' => 'Prioridad',
			'activo' => 'Activo',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idgaleria',$this->idgaleria);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('titulo_seo',$this->titulo_seo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('materiales',$this->materiales,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->order = 'prioridad DESC, created DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}