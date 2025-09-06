<?php

/**
 * This is the model class for table "publicidadtips".
 *
 * The followings are the available columns in table 'publicidadtips':
 * @property integer $idpublicidad
 * @property string $titulo
 * @property string $titulo_seo
 * @property string $descripcion
 * @property string $url
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $activo
 * @property string $created
 * @property string $modified
 */
class Publicidadtips extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Publicidadtips the static model class
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
		return 'publicidadtips';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, titulo_seo, url, activo, created, modified', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('titulo, titulo_seo', 'length', 'max'=>45),
			array('url', 'length', 'max'=>255),
			array('fecha_inicio, fecha_fin','date','format'=>'dd-MM-yyyy'),
			array('descripcion,fecha_inicio, fecha_fin', 'length', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpublicidad, titulo, titulo_seo, descripcion, url, activo, created, modified', 'safe', 'on'=>'search'),
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

			'idpublicidad' => 'Idpublicidad',
			'titulo' => 'Titulo',
			'titulo_seo' => 'Titulo Seo',
			'descripcion' => 'Descripcion',
			'url' => 'Url',
 			'fecha_inicio' => 'Fecha Inicio',
 			'fecha_fin' => 'Fecha Fin',
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

		$criteria->compare('idpublicidad',$this->idpublicidad);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('titulo_seo',$this->titulo_seo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}