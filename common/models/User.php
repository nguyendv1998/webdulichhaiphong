<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\web\IdentityInterface;

///**
// * User model
// *
// * @property integer $id
// * @property string $username
// * @property string $password_hash
// * @property string $password_reset_token
// * @property string $verification_token
// * @property string $Email
// * @property string $auth_key
// * @property integer $status
// * @property integer $created_at
// * @property integer $updated_at
// * @property string $password write-only password
// * @property string $LoaiTaiKhoan
// * @property string $SoDienThoai
// * @property string $TenNguoiDung
// */
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password_hash
 * @property string|null $TenNguoiDung
 * @property string|null $Email
 * @property string|null $SoDienThoai
 * @property string $LoaiTaiKhoan
 * @property string|null $auth_key
 * @property string|null $password_reset_token
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 * @property string $verification_token
 * @property string $password
 *
 * @property BaiViet[] $baiviets
 * @property BaiViet[] $baiviets0
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LoaiTaiKhoan', 'password_hash','status'], 'required','message'=>'Không được để trống'],
            [['LoaiTaiKhoan', 'auth_key', 'password_reset_token', 'verification_token', 'password'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['username', 'SoDienThoai'], 'string', 'max' => 20],
            [['password_hash'], 'string', 'max' => 200],
            [['TenNguoiDung'], 'string', 'max' => 45],
            [['Email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Tên đăng nhập',
            'password_hash' => 'Mật khẩu',
            'TenNguoiDung' => 'Tên người dùng',
            'Email' => 'Email',
            'SoDienThoai' => 'Số điện thoại',
            'LoaiTaiKhoan' => 'Loại tài khoản',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày chỉnh sửa',
            'status' => 'Trạng thái',
            'verification_token' => 'Verification Token',
            'password' => 'Password',
        ];
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification Email token
     *
     * @param string $token verify Email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for Email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public  function beforeSave($insert)
    {

        if($insert) {
            $this->created_at= date("Y-m-d H:i:s");
            $this->generateAuthKey();
            $this->generatePasswordResetToken();
            $this->setPassword($this->password_hash);
        }
        else if(!$insert) {
            $this->updated_at=date("Y-m-d H:i:s");
            $old_user=User::findOne($this->id);
            if($old_user->password_hash!=$this->password_hash){
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
                $this->setPassword($this->password_hash);
            }
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
